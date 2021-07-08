<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<style media="screen">
  .add-btn{
    padding: 0px 6px;
    border: 1px solid grey;
    background-color: #bd1212f0;
    color: white;
    font-size: 17px;
  }
  .images,.featuredImage{ border: 1px solid #ccc;  padding:1px; }
.chk-box label{
    background: #f6f5f5;
    padding: 0 5px;
}
</style>
<div class="container" style="padding: 25px 15px">
    <div class="row">
        <div class="col-md-3">
            @include('partials.adminsidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <strong>Update Product:</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
                @include('errors.errors')
                <p class="card-text">
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label>Product Name*:</label>
                            <input type="text" name="productName" value="{{ $product->productName }}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Select Category*:</label>
                                    <select name="category" class="form-control">
                                        @if( count($categories) )
                                        
                                        @foreach ( $categories as $category )
                                            <option value="{{ $category->id }}" {{ $category->id == $product->categoryId ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach

                                        @else
                                            <option value="">-- Select --</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Unit Type*:</label>
                                    <select name="unit" class="form-control">
                                        <option value="pcs" {{ $product->unit == 'pcs' ? 'selected' : '' }}>Pieces</option>
                                        <option value="package" {{ $product->unit == 'package' ? 'selected' : '' }}>Package</option>
                                        <option value="set" {{ $product->unit == 'set' ? 'selected' : '' }}>Set</option>
                                        <option value="dozen" {{ $product->unit == 'dozen' ? 'selected' : '' }}>Dozen</option>
                                        <option value="kg" {{ $product->unit == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>

                                        <option value="h_kg" {{ $product->unit == 'h_kg' ? 'selected' : '' }}>1/2 Kilogram (kg)</option>
                                        <option value="q_kg" {{ $product->unit == 'q_kg' ? 'selected' : '' }}>1/4 Kilogram (kg)</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <img class="featuredImage" src="{{ asset( 'uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="" height="70" width="80" style="object-fit: contain;"> 
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        @foreach( $product->images as $img )
                                        <div class="col-md-4">
                                            <figure class="images">
                                                <img src="{{ asset( 'uploads/products/thumbnails/' . $img->image ) }}" alt="" height="60" style="object-fit: contain;width: 100%"> 
                                                <a href="{{ route('remove.image', $img->id) }}" title="Click to remove image."><i class="fa fa-trash"></i></a>
                                            </figure>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Update Featured Image:</label>
                                    <input type="file" name="featuredImage" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Add new Images (if any):</label>
                                    <input multiple type="file" class="form-control" name="images[]">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Keywords (Highlights):</label><br>
                                    <small style="color:red">Add keywords separated by comma.</small>
                                    <input type="text" name="keywords" class="form-control" placeholder="keyword1, keyword2, ..." value="{{ $product->keywords }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Quantity (optional):</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Featured?</label>
                                    <select name="featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1" {{ $product->featured ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                                

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Actual Rate*:</label>
                                    <input type="text" name="actualRate" value="{{ $product->actualRate }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Discount (% or Rs.)</label>
                                    <input type="text" name="discount" value="{{ $product->discountPercent }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Selling Price (Rate)*:</label>
                                    <input type="text" name="sellingPrice" value="{{ $product->rate }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Tags (optional):</label>
                            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                            @if( count($tags) )

                            @foreach( $tags as $tag )
                                <option value="{{ $tag->id }}" {{ ( count($product->tags) && in_array($tag->id, $product->tags()->pluck('tags_id')->toArray()) ) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach

                            @else
                              <option value="">No Tags</option>
                            @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Short Description*:</label>    
                            <textarea name="shortDesc" rows="3" class="form-control">{{ $product->shortDesc }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>More Details ( थप / लामो विवरण ):</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{!! $product->description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <label>Delivery Area:</label>
                                    <select name="delivery_area" class="form-control">
                                        @php
                                            $area = App\Zones::get();
                                        @endphp


                                            <option value="">Select</option>
                                        @foreach($area as $aa)
                                            <option value="{{ $aa->headquarter }}" {{ $product->delivery_area == $aa->headquarter ? 'selected' : '' }}>{{ $aa->headquarter }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label>Delivery Time:</label>
                                    <select name="delivery_time" class="form-control">
                                        <option>Select</option>
                                        <option value="1" {{ $product->delivery_time == '1' ? 'selected' : '' }}>1 Day</option>
                                        <option value="3" {{ $product->delivery_time == '3' ? 'selected' : '' }}>3 Day</option>
                                        <option value="7" {{ $product->delivery_time == '7' ? 'selected' : '' }}>7 Day</option>
                                        <option value="15" {{ $product->delivery_time == '15' ? 'selected' : '' }}>15 Days</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label>Shipping Charge (RS.):</label>
                                    <input type="number" min="0" max="1000" step="any" name="shipping_charge" class="form-control" value="{{ $product->shipping_charge }}">
                                </div>

                            </div>
                            
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-lg" name="submit_product" value="Update Product">
                        </div>

                    </form>
                </p>
              </div>
            </div>
        </div>
    </div>
</div>
