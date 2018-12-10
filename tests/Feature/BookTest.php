<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @group view-all-books
     * @return void
     */
    public function testViewAllBooks()
    {
//        $book1 = factory(Book::class)->create();
        $book1 = Book::create([
            'title' => 'Debi',
            'author' => 'Humayun Ahmed'
        ]);

        $resp = $this->get(route('books.index'));

        $resp->assertStatus(200);
        $resp->assertViewIs('books.index');
        $resp->assertSee('Debi');
        $resp->assertSee('Humayun Ahmed');

    }


    /**
     * @group view-single-book
     * @return void
     */
    public function testViewSingleBook()
    {

        $book = Book::create([
            'title' => 'Satkahan',
            'author' => 'Somoresh Mujumder'
        ]);

        $resp = $this->get(route('books.show', $book->id));

        $resp->assertStatus(200);
        $resp->assertViewIs('books.show');
        $resp->assertSee('Satkahan');
        $resp->assertSee('Somoresh Mujumder');

    }

    /**
     * @group require-book-title
     * @return void
     */
    public function testRequireBookTitleAndAuthor()
    {

        $book = factory(Book::class)->create([
            'title' => '',
            'author'=> ''
        ]);

        $resp = $this->post(route('books.store'), $book->toArray());
        $resp->assertSessionHasErrors('title');
        $resp->assertSessionHasErrors('author');

    }
}
