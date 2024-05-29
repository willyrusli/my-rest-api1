<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Skincare;
use OpenApi\Annotations as OA;

/**
 * Class Skincare.
 *
 * @author Willy <willy.422023024@civitas.ukrida.ac.id>
*/
class SkincareController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/skincare",
     *     tags={"skincare"},
     *     summary="Display a listing of items",
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="successful",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function index()
    {
        return Skincare::get();
    }

    /**
     * @OA\Post(
     *     path="/api/skincare",
     *     tags={"skincare"},
     *     summary="Store a newly created item",
     *     operationId="store",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful",
     *         @OA\JsonContent()
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body description",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/Skincare",
     *             example={"nama": "Cetaphil Gentle Skin Cleanser",
     *                      "brand": "Cetaphil",
     *                      "category": "Cleanser (Pembersih Wajah)",
     *                      "price": "150000",
     *                      "stock": "1000",
     *                      "description": "Cetaphil Gentle Skin Cleanser adalah pembersih wajah yang diformulasikan untuk kulit sensitif..",
     *                      "image": "https://tse4.mm.bing.net/th?id=OIP.4lndUWsMx42RQGJSicHXKAHaHa&pid=Api&P=0&h=180"
     *                     }
     *         ),
     *     ),
     *     security={{"passport_token_ready":{},"passport":{}}}
     * )
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'brand' => 'required',
            ]);
            if ($validator->fails()) {
                throw new HttpException(400, $validator->messages()->first());
            }
            $skincares = new Skincare;
            $skincares->fill($request->all())->save();
            return $skincares;

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }   
    }

    /**
     * @OA\Get(
     *     path="/api/skincare/{id}",
     *     tags={"skincare"},
     *     summary="Display the specified item",
     *     operationId="show",
     *     @OA\Response(
     *         response=404,
     *         description="Item not found",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of item that needs to be displayed",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int65"
     *         )
     *     ),
     * )
     */
    public function show(string $id)
    {
        $skincares = Skincare::find($id);
        if(!$skincares){
            throw new HttpException(400, 'Item not found');
        }
        return $skincares;
    }
    
    /**
     * @OA\Put(
     *      path="/api/skincare/{id}",
     *      tags={"skincare"},
     *      summary="Update the specified item",
     *      operationId="update",
     *      @OA\Response(
     *          response=404,
     *          description="Item not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of item that needs to be updated",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body description",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/Skincare",
     *             example={"nama": "Kiehl's Ultra Facial Cream",
     *                      "brand": "Kiehl's",
     *                      "category": "Moisturizer (Pelembap)",
     *                      "price": "200000",
     *                      "stock": "1500",
     *                      "description": "Pelembap yang memberikan hidrasi 24 jam dengan tekstur ringan dan cepat meresap.",
     *                      "image": "https://feelunique.com/cdn-cgi/image/quality=75,format=auto,metadata=none,dpr=1/img/products/61024/alternative/Kiehl__039_s_Ultra_Facial_Cream_50ml_1_1523698750.jpg"
     *                      }
     *          ),
     *      ),
     *     security={{"passport_token_ready":{},"passport":{}}}
     * )
     */
    public function update(Request $request, string $id)
    {
        $skincare = Skincare::find($id);
        if(!$skincares) {
            throw new HttpException (404, 'Item not found');
        }

        try {
            $validator = Validator:: make($request->all(), [
                'nama' => 'required',
                'brand' => 'required',
            ]);
            if ($validator->fails()) {
                throw new HttpException (400, $validator->messages()->first());
            }
            $skincares->fill($request->all())->save();
            return response()->json(array('message' => 'Updated successfully'), 200);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data: {$exception->getMessage()}");
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/skincare/{id}",
     *      tags={"skincare"},
     *      summary="Remove the specified item",
     *      operationId="destroy",
     *      @OA\Response(
     *          response=404,
     *          description="Item not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of item that needs to be removed",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     security={{"passport_token_ready":{},"passport":{}}}
     * )
     */
    public function destroy(string $id)
    {
        $skincares = Skincare::find($id);
        if(!$skincare) {
            throw new HttpException (404, 'Item not found');
        }
    
        try {
            $skincare->delete();
            return response()->json(array('message' => 'Deleted successfully'), 200);

        } catch(\Exception $exception) {
            throw new HttpException (400, "Invalid data: ($exception->getMessage()}");
        }
    }
}