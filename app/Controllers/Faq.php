<?php

namespace App\Controllers;

use App\Models\FaqModel;

class Faq extends BaseController
{
    public function index()
    {
        $faqModel = new FaqModel();
        $data['faqs'] = $faqModel->getAllFaq();
        $data['title'] = 'FAQ - Pertanyaan yang Sering Diajukan';

        return view('faq_page', $data);
    }
}
