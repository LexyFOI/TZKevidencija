<?php

namespace Tests\Feature;

use App\HourHeld;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HoursHeldManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_hour_held_can_be_added()
    {
        $this->post('/hours', $this->hhData());

        $this->assertCount(1,HourHeld::all());
    }

    /** @test */
    public function an_hour_held_can_be_updated()
    {
        $this->post('/hours', $this->hhData());

        $hour = HourHeld::first();
        $this->patch($hour->path(),[
            'hs_date'=>'11.08.2020.',
            'hs_day'=>'utorak',
            'group_id'=>2,
            'student_id'=>2,
            //'points'=>'3.0',
        ]);

        $this->assertEquals('11.08.2020.', HourHeld::first()->hs_date);
        $this->assertEquals('utorak', HourHeld::first()->hs_day);
        $this->assertEquals('2', HourHeld::first()->group_id);
        $this->assertEquals('2', HourHeld::first()->student_id);
    }

    /** @test */
    public function an_hour_held_can_be_deleted()
    {
        $this->post('/hours', $this->hhData());

        $hour = HourHeld::first();

        $response = $this->delete($hour->path());

        $this->assertCount(0, HourHeld::all());
        $response->assertRedirect('/hours');
    }

    ///samo registrirani korisnik može upisati studente na sat

    /**
     * @return array
     */
    private function hhData(): array
    {
        return [
            'hs_date' => '12.08.2020.',
            'hs_day' => 'srijeda',
            'group_id' => 1,
            'student_id' => 1,
        ];
    }
}
