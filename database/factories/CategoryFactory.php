use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->word(); // Ensure unique names

        return [
            'name' => $name,
            'slug' => Str::slug($name) // Generate slug from name
        ];
    }
}
