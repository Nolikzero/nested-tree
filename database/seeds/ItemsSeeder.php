<?

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Item::class)->create()->each(function (\App\Item $i) {
            if(\App\Item::count() < 45) {
                $this->run();
            }
        });
    }
}