<?php echo "this is the dashboard";

?>

<form action="filter" method="post">
    <label for="category">Välj kategori att filtrera</label>
    <select name="category">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
    <div>
        @foreach ($ingredients as $ingredient)
        <label for="checkbox">{{$ingredient->name}}</label>
        <input type="checkbox" name="remove-ingredient[]" value="{{$ingredient->name}}">
        @endforeach
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

<a href="dashboard">Reset</a>

@foreach ($recipes as $recipe)
<a href="{{$recipe->id}}" data-recipeId="{{$recipe->id}}" id="{{$recipe->id}}" style="display: block;">{{$recipe->title}}</a>
@endforeach

@auth
<a href="addRecipe">Go to add reciepe</a>

<div></div>
<form action="logout" method="post">

    <button type="submit">Logout</button>

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
@endauth
@guest
<a href="/">Log in</a>
@endguest