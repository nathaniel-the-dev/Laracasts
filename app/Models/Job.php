<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class JobListing extends Model // Eloquent automatically gets the table name from the class name 
class Job extends Model
{
    // private static $allJobs = [];
    // public static function all(): array
    // {
    //     return self::$allJobs;
    // }
    // public static function find(int $id): ?array
    // {
    //     return Arr::first(self::$allJobs, fn($j) => $j['id'] == $id);
    // }

    use HasFactory;

    protected $table = 'job_listings'; // Or you can specify the table name to use 

    protected $fillable = ['title', 'description', 'salary', 'company_id'];
    // protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }

    public static function store($request): Job
    {
        $job = self::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'salary' => $request['salary'],
            'company_id' => $request['company_id'] ?? Company::first()->id,
        ]);

        return $job;
    }

    public function edit($request)
    {
        $this->update([
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
        ]);
        $this->save();

        return $this;
    }
}