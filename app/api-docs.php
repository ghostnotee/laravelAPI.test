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
 *      @OA\Property(property="name", type="string"),
 *      @OA\Property(property="price", type="number")
 *      },
 *     required={"id", "name"}
 * )
 */

/**
 * @OA\Schema(
 *     title="ApiResponse",
 *     description="ApiResponse model",
 *     type="object",
 *     schema="ApiResponse",
 *     properties={
 *      @OA\Property(property="success", type="boolean"),
 *      @OA\Property(property="data", type="object"),
 *      @OA\Property(property="message", type="string"),
 *      @OA\Property(property="errors", type="object"),
 *      }
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

/**
 *  @OA\Get(
 *     path="/api/products/{productId}",
 *     tags={"product"},
 *     summary="Get Product By Id",
 *     operationId="show",
 *     @OA\Parameter(
 *      name="productId",
 *      in="path",
 *      description="The id column of the product to retrieve",
 *      required=true,
 *      @OA\Schema(type="integer", format="int32")
 *     ),
 *     @OA\Response(
 *      response=200,
 *      description="Product detail",
 *      @OA\JsonContent(ref="#/components/schemas/ApiResponse")
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

/**
 *  @OA\Post(
 *     path="/api/products",
 *     tags={"product"},
 *     summary="Create new product",
 *     operationId="show",
 *     @OA\RequestBody(
 *      description="Store a product",
 *      required=true,
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(
 *      response=201,
 *      description="Product created",
 *      @OA\JsonContent(ref="#/components/schemas/ApiResponse")
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
