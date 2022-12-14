<?php

namespace QueryJson\Test;

use \Orchestra\Testbench\TestCase as TestBenchCase;
use QueryJson\QueryJsonServiceProvider;

class TestCase extends TestBenchCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, string>
     */
    protected function getPackageProviders($app)
    {
        return [
            QueryJsonServiceProvider::class,
        ];
    }

    /**
     * @param array $data
     * @return void
     */
    protected function insertData(array $data): void
    {
        foreach ($data as $value) {
            \DB::table('test_json')->insert([
                'json' => $value
            ]);
        }
    }
}