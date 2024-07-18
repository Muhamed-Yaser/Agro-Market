<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function about(Request $request)
    {


        $imagePath = 'aboutImage/banner1.jpg';
        $imageUrl = URL::to(Storage::url($imagePath));

        $aboutText = "AgroMarket Egypt: the link from Farmers and Consumers is a pioneering web application designed to revolutionize the agricultural sector in Egypt by fostering direct communication between farmers and consumers. The platform addresses the longstanding issue of intermediaries exploiting both parties by offering a transparent and fair marketplace for agricultural product transactions.
                      Through user profiles, product listings, quality assurance mechanisms, transparent pricing tools, and order and delivery features, AgroMarket Egypt empowers farmers to access a broader market and receive fair compensation for their products. Simultaneously, it provides consumers with access to fresh, locally sourced products while promoting transparency and accountability.
                      With a focus on user engagement, feedback, and continuous improvement, the platform aims to build trust among users and positively impact local farmers' income and consumers' access to quality agricultural products. By promoting sustainable and ethical farming practices, AgroMarket Egypt contributes to a more equitable and transparent agricultural ecosystem in Egypt, benefiting both farmers and consumers alike.";

        return response()->json([
            'success' => true,
            'data' => [
                'image_url' => $imageUrl,
                'text' => $aboutText,
            ]
        ], 200);
    }
}
