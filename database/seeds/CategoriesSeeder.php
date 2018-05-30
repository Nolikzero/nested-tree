<?

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class)->create()->each(function (\App\Category $c) {
            if(\App\Category::count() < 15) {
                $this->run();
            }
        });
    }
}