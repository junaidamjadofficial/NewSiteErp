<?php

namespace Workdo\LandingPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Workdo\LandingPage\Models\NewsletterSubscriber;

class DemoNewsletterSubscriberSeeder extends Seeder
{
    public function run(): void
    {
        if (class_exists(\Faker\Factory::class)) {
            $this->runWithFaker();
            return;
        }

        $this->runWithoutFaker();
    }

    protected function runWithFaker(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $subscribedAt = $faker->dateTimeBetween('-6 months', 'now');

            NewsletterSubscriber::create([
                'email' => $faker->unique()->safeEmail,
                'subscribed_at' => $subscribedAt,
                'ip_address' => $faker->ipv4,
                'country' => $faker->country,
                'city' => $faker->city,
                'region' => $faker->state,
                'country_code' => $faker->countryCode,
                'isp' => $faker->company . ' ISP',
                'org' => $faker->company,
                'timezone' => $faker->timezone,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'user_agent' => $faker->userAgent,
                'browser' => $faker->randomElement(['Chrome', 'Firefox', 'Safari', 'Edge']),
                'os' => $faker->randomElement(['Windows 10', 'macOS', 'Linux', 'Android', 'iOS']),
                'device' => $faker->randomElement(['Desktop', 'Mobile', 'Tablet']),
                'created_at' => $subscribedAt,
                'updated_at' => $subscribedAt,
            ]);
        }
    }

    protected function runWithoutFaker(): void
    {
        $now = now();
        $emails = ['demo@example.com', 'newsletter@example.com'];

        foreach ($emails as $i => $email) {
            $subscribedAt = $now->copy()->subDays(30 - $i * 10);
            NewsletterSubscriber::create([
                'email' => $email,
                'subscribed_at' => $subscribedAt,
                'ip_address' => '127.0.0.1',
                'country' => 'Unknown',
                'city' => 'Unknown',
                'region' => null,
                'country_code' => null,
                'isp' => null,
                'org' => null,
                'timezone' => 'UTC',
                'latitude' => null,
                'longitude' => null,
                'user_agent' => null,
                'browser' => null,
                'os' => null,
                'device' => null,
                'created_at' => $subscribedAt,
                'updated_at' => $subscribedAt,
            ]);
        }
    }
}