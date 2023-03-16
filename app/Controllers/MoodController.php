<?php

namespace App\Controllers;

use App\Models\MoodModel;

class MoodController extends BaseController
{
    
    public function index()
    {
        $model = model(MoodModel::class);

        $data = [
            'mood'  => $model->getMood(),
            'title' => 'Jou moods',
        ];

        return view('templates/header', $data)
            . view('mood/index')
            . view('templates/footer'); 
    }

    // public function view($slug = null)
    // {
    //     $model = model(MoodModel::class);

    //     $data['mood'] = $model->getMood($slug);

    //     if (empty($data['mood'])) {
    //         throw new PageNotFoundException('Cannot find the mood item: ' . $slug);
    //     }

    //     $data['title'] = $data['mood']['title'];

    //     return view('templates/header', $data)
    //         . view('mood/view')
    //         . view('templates/footer');
    // }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a mood item'])
                . view('mood/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['datum', 'mood','plekken']);

        // Checks whether the submitted data pa ssed the validation rules.
        if (! $this->validateData($post, [
            'datum' => 'required|max_length[255]|min_length[1]',
            'mood'  => 'required|max_length[500]|min_length[1]',
            'plekken' => 'required|max_length[255]|min_length[1]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a mood item'])
                . view('mood/create')
                . view('templates/footer');
        }

        $model = model(MoodModel::class);
        $user = auth()->user()->id;
        $model->save([
            'datum' => $post['datum'],
            'user'  => $user,
            'mood'  => $post['mood'],
            'plekken' => $post['plekken'],
        ]);

        return view('templates/header', ['title' => 'Create a mood item'])
            . view('mood/success')
            . view('templates/footer');
    }

    public function average()
    {
        $result= mysql_query("SELECT AVG(mood) AS average FROM mood");

        $row = mysql_fetch_assoc($result); 

        $average = $row['average'];

        echo ("This is the average: $average");
    }
}