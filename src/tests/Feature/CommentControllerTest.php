<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testCommentForm()
    {
        $item = Item::factory()->create();

        $comments = Comment::factory()->count(3)->create(['item_id' => $item->id, 'user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)
                    ->get(route('commentForm', ['item_id' => $item->id]));

        $response->assertStatus(200)
            ->assertViewIs('comment')
            ->assertViewHas('item', $item)
            ->assertViewHas('comments')
            ->assertViewHas('users')
            ->assertSee($comments[0]->comment)
            ->assertSee($comments[1]->comment)
            ->assertSee($comments[2]->comment);
    }

    public function testComment()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();

        $commentData = [
            'item_id' => $item->id,
            'comment' => 'テストコメント',
        ];

        $response = $this->actingAs($user)
            ->post(route('comment'), $commentData);

        $response->assertRedirect(route('commentForm', ['item_id' => $item->id]))
            ->assertSessionHas('message', 'コメントを投稿しました。');
    }

    public function testCommentDelete()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();
        $comment = Comment::factory()->create(['item_id' => $item->id, 'user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->delete(route('commentDelete', ['comment' => $comment->id]));

        $response->assertRedirect()
            ->assertSessionHas('message', 'コメントが削除されました。');
    }
}
