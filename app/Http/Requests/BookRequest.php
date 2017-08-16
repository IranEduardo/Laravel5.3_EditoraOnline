<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $book = $this->route('book');
        $book_user_id = (($book != null) and
                         ($book->author != null) and
                         ($book->author->user != null)) ? $book->author->user->id : null;

        return (($book_user_id == Auth::id()) or
                ($book == null)) and
                (Auth::user()->author);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $book = $this->route('book');
        $id = $book != null ? $book->id : null;

        return [
                'title'     => "required|max:255|unique:books,title,$id",
                'subtitle'  => 'required|max:255',
                'price'     => 'required|numeric',
          ];
    }
}
