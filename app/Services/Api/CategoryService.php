<?php

namespace App\Services\Api;

use App\Models\Category;

class CategoryService extends ParentApiService
{
    public function getAll(): array
    {
        $categories = $this->http->get('categories')->json();
        info('fetching categories', array_column($categories, 'name'));
        return $categories;
    }

    public function sync()
    {
        try {
            foreach ($this->getAll() as $category) {
                $found = Category::where('seo_app_id', $category['id'])->first();

                if ($found === null) {
                    info('inserting new category: ' . $category['name']);
                    // create
                    Category::insert([
                        'name'       => $category['name'],
                        'term_id'    => $category['term_id'],
                        'seo_app_id' => $category['id'],
                        'updated_at' => $category['updated_at'],
                        'created_at' => $category['created_at'],
                    ]);
                } else {
                    // found -> update
                    $found->forceFill([
                        'name'       => $category['name'],
                        'term_id'    => $category['term_id'],
                        'seo_app_id' => $category['id'],
                        'updated_at' => $category['updated_at'],
                        'created_at' => $category['created_at'],
                    ]);

                    if ($found->isDirty()) {
                        $found->save();
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateOrCreate(array $category)
    {
        return Category::updateOrCreate([
            'seo_app_id' => $category['id'],
        ], [
            'name'       => $category['name'],
            'updated_at' => $category['updated_at'],
            'created_at' => $category['created_at'],
        ]);
    }
}
