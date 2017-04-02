<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 4/2/17
 * Time: 9:02 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Book;


class BookStoreController extends Controller
{
    // books model instance. will be injected
    public $bookModel;

    /**
     * BookStoreController constructor.
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->bookModel = $book;
    }

    /**
     * @return $this
     */
    public function index()
    {
        // pull all of our books we have stored
        return view('books.index')
            ->with('books', $this->bookModel->all());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // nothing here. we just show the view with the form to insert a book
        return view('books.create');
    }

    /**
     * Return view
     */
    public function store()
    {
        // all classes that extend controller have a validate trait
        // available for use. If failed validation we are redirected back

        $rules = [
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'year_released' => 'required|numeric'
        ];

        // validate
        $this->validate(request(), $rules);

        // if we made it this far then we can insert the new book
        $this->bookModel
            ->insert(request()->only(['name', 'author', 'description', 'year_released']));

        request()->session()->flash('message', 'We successfully inserted your book.');
        return redirect()->route('books.index');
    }

    /**
     * @param $id
     *
     * @return view|redirect
     */
    public function show($id)
    {
        $book = $this->bookModel->find($id);

        // check if we have a model. if not redirect back
        if(!$book) {
            return redirect()->back();
        }

        // return the show view
        return view('books.show')->with('book', $book);
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        // get the book we are trying to edit
        $book = $this->bookModel->find($id);

        // check if we found the matching book
        if(!$book)
        {
            return redirect()->back();
        }

        // return the edit view
        return view('books.edit')->with('book', $book);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $rules = [
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'year_released' => 'required|numeric'
        ];

        // validate
        $this->validate(request(), $rules);

        $book = $this->bookModel->find($id);

        /* either of the two methods work below */
        $book->update(
            [
                'name' => request()->get('name'),
                'author' => request()->get('author'),
                'description' => request()->get('description'),
                'year_released' => request()->get('year_released')
            ]
        );
        // if we made it this far then we can insert the new book
        /*$book->name = request()->get('name');
        $book->author = request()->get('author');
        $book->description = request('description');
        $book->year_released = request()->get('year_released');
        $book->save();*/

        // we should flash a message
        request()->session()->flash('message', 'We have updated the book');

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = $this->bookModel->find($id);

        $book->delete();

        // flash message
        request()->session()->flash('message', 'Book was deleted');

        return redirect()->route('books.index');
    }
}