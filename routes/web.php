<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'home', ['title' => 'Welcome'])->name('home');
Route::view('/contact', 'contact');

// Auth 
Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware(['throttle:login']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::controller(JobController::class)->prefix('/jobs')->missing(
    fn() => Redirect::to('/404')
)->group(function () {
    Route::get('/', 'index');

    Route::get('/create', 'create')->middleware('auth');
    Route::post('/', 'store')->middleware('auth');

    Route::get('/{job}', 'show');

    // Route::get('/{job}/edit', 'edit')->middleware(['auth', 'can:job.edit.job']);
    Route::get('/{job}/edit', 'edit')->middleware(['auth'])->can('update', 'job');
    Route::patch('/{job}', 'update')->middleware(['auth'])->can('update', 'job');

    Route::delete('/{job}', 'delete')->middleware(['auth'])->can('delete', 'job');
});

Route::fallback(function () {
    return view('404');
});

// Routing using resources
// Route::resource('/jobs', JobController::class, [
//     // 'only' => ['view'],
//     // 'except' => ['delete']
// ]);

// Routes: Using Controller classes (grouped)
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'delete');
//     Route::get('/jobs/{job}/edit', 'edit');
// });

// Routes: Using Controller classes

// Route::get('/jobs', [JobController::class, 'index']);
// Route::post('/jobs', [JobController::class, 'store']);
// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'delete']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// // Index
// Route::get('/jobs', function () {
//     // $jobs = Job::with('company')->get(); // Gets all jobs
//     $jobs = Job::with('company')->latest()->simplePaginate(6); // Gets paginated jobs

//     return view('jobs.index', [
//         'title' => 'Jobs',
//         'jobs' => $jobs
//     ]);
// });

// // Create
// Route::get('/jobs/create', function () {
//     return view('jobs.create');
// });

// // // Show
// // Route::get('/jobs/{id}', function ($id) {
// //     $job = Job::find($id);

// //     if (!$job) {
// //         return abort(404, 'Job not found');
// //     }

// //     return view('jobs.show', [
// //         'title' => $job['title'],
// //         'job' => $job,
// //     ]);
// // });

// // Show (with Route Model Binding) - Use {job:id} to specify the field to search by
// Route::get('/jobs/{job}', function (Job $job) {
//     if (!$job) {
//         return abort(404, 'Job not found');
//     }

//     return view('jobs.show', [
//         'title' => $job['title'],
//         'job' => $job,
//     ]);
// });

// // Store
// Route::post('/jobs', function () {
//     request()->validate([
//         'title' => ['required', 'min:3', 'max:255'],
//         'description' => ['required', 'max:1000'],
//         'salary' => ['required', 'min:0', 'max:1000000'],
//     ]);

//     Job::create([
//         'title' => request('title'),
//         'description' => request('description'),
//         'salary' => request('salary'),
//         'company_id' => 1,
//     ]);

//     return redirect('/jobs');
// });

// // Edit
// Route::get('/jobs/{id}/edit', function ($id) {
//     $job = Job::find($id);

//     if (!$job) {
//         return abort(404, 'Job not found');
//     }

//     return view('jobs.edit', [
//         'job' => $job,
//     ]);
// });

// // Update
// Route::patch('/jobs/{id}', function ($id) {
//     // Find job
//     $job = Job::findOrFail($id);

//     // Validate
//     request()->validate([
//         'title' => ['required', 'min:3', 'max:255'],
//         'description' => ['required', 'max:1000'],
//         'salary' => ['required', 'min:0', 'max:1000000'],
//     ]);

//     // Update
//     $job->update([
//         'title' => request('title'),
//         'description' => request('description'),
//         'salary' => request('salary'),
//     ]);
//     $job->save();


//     // Redirect
//     return redirect("/jobs/$job->id");
// });


// // Delete
// Route::delete('/jobs/{id}', function ($id) {
//     // TODO Authorize

//     // Find job
//     $job = Job::findOrFail($id);

//     // Delete
//     $job->delete();

//     // Redirect
//     return redirect("/jobs");
// });

