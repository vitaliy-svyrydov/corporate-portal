<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => '<h2 style="color:#fff">CORPORATE, MULTIPURPOSE.. <br /><span>PINK RIO</span></h2>',
            'desc' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque',
            'img'=>'xx.jpg'
        ]);
        Slider::create([
            'title' => '<h2 style="color:#fff">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>',
            'desc' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque',
            'img'=>'00314.jpg'
        ]);
        Slider::create([
            'title' => '<h2 style="color:#fff">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>',
            'desc' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque',
            'img'=>'dd.jpg'
        ]);
    }
}
