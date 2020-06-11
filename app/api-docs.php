<?php

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel API Documentation",
 *     description="This is a sample API documentation.",
 *     termsOfService="http://laravelapi.test/api/terms",
 *     @OA\Contact(email="selcukbilgen@hotmail.com"),
 *     @OA\License(name="Apache 2.0", url="http://www.apache.org/licenses/LICENSE-2.0.html")
 * )
 */

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 *     type="object",
 *     schema="Product",
 *     properties={
 *      @OA\Property(property="id", type="integer", format="int64", description="id column"),
 *      @OA\Property(property="name", type="string")
 *      },
 *     required={"id", "name"}
 * )
 */

/**
 *  @OA\Get(
 *     path="/api/products",
 *     tags={"product"},
 *     summary="List all products",
 *     operationId="index",
 *     @OA\Parameter(
 *      name="limit",
 *      in="query",
 *      description="How many items to return at one time",
 *      required=false,
 *      @OA\Schema(type="integer", format="int32")
 *     ),
 *     @OA\Response(
 *      response=200,
 *      description="A paged array of products",
 *      @OA\JsonContent(
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Product")
 *      )
 *     ),
 *     @OA\Response(
 *     response=401,
 *     description="Unauthorized",
 *     @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *     response="default",
 *     description="Unexpected Error",
 *     @OA\JsonContent()
 *     )
 * )
 */
