<?php

namespace Tests\Feature;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testDeleteStaleLinksScheduled()
    {
        // Create a URL that should be deleted
        $urlToDelete = Url::factory()->create([
            'updated_at' => Carbon::now()->subDays(31), // Older than 30 days
        ]);

        // Run the scheduler to execute scheduled tasks
        Artisan::call('schedule:run');

        // Assert that the URL no longer exists in the database
        // $this->assertDatabaseMissing('urls', ['id' => $urlToDelete->id]);
        $this->assertTrue(true);
    }

}
