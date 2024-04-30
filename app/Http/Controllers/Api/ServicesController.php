<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class ServicesController extends Controller
{
    public function initialize()
    {
        $service = new service();
        $service = $service->initialize();

        return serviceResource::collection($service);
    }
    public function index()
    {
       // All Service
       $service = service::all();
      
       // Return Json Response
       return response()->json([
          'service' => $service
       ],200);
    }
    public function store(servicetoreRequest $request)
    {
        try {

                  // Create Service
            Service::create([
                'name' => $request->name,
                'tipo' => $tipo,
                'description' => $request->description,
                'price'=>$request->price
            ]);
      
           
      
            // Return Json Response
            return response()->json([
                'message' => "Service successfully created."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }
  
    public function show($id)
    {
       // Service Detail 
       $service = Service::find($id);
       if(!$service){
         return response()->json([
            'message'=>'Service Not Found.'
         ],404);
       }
      
       // Return Json Response
       return response()->json([
          'Service' => $Service
       ],200);
    }
  
    public function update(servicetoreRequest $request, $id)
    {
        try {
            // Find Service
            $service = Service::find($id);
            if(!$service){
              return response()->json([
                'message'=>'Service Not Found.'
              ],404);
            }
            // Update service
            $service->save();
      
            // Return Json Response
            return response()->json([
                'message' => "Service successfully updated."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }
  
    public function destroy($id)
    {
        // Detail 
        $service = Service::find($id);
        if(!$service){
          return response()->json([
             'message'=>'Service Not Found.'
          ],404);
        }
      
        
        // Delete service
        $service->delete();
      
        // Return Json Response
        return response()->json([
            'message' => "Service successfully deleted."
        ],200);
    }}
