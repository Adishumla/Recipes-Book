<?php

use App\Models\User;
use App\Models\Ingredient;
use App\Models\Category;

echo "Here you can add a recipe";
// print_r($ingredients);
// echo $ingredients[0]['name'];
// echo $ingredients[0]->name;
// foreach($ingredients as $ingredient){
//     echo $ingredient->name;
// }
?>
<!doctype html>
<link rel="stylesheet" href="/app.css">

<body>
    <form action="/addRecipeToDb" method="post">
        <label for="title">Ange namn för ditt recept</label>
        <input type="text" name="title">
        <label for="category">Välj kategori för ditt recept</label>
        <select name="category">
            @foreach ($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
        <!-- <ul id="myLi" name="ingredients-list">
        </ul> -->
        <label for="ingredients">Välj en ingredient för att lägga till i ditt recept</label>
        <div class="ingredient-list">
            <div>
                <select id="chosenIngredient" name="ingredients[0]">
                    @foreach ($ingredients as $ingredient)
                    <option id="{{$ingredient->id}}" name="ingredients">{{$ingredient->name}}</option>
                    @endforeach
                </select>
                <label for="amount">Mängd</label>
                <input id="amount" type="text" name="amount[0]">
                <label for="unit">Enhet</label>
                <select id="unit" class="unit" name="unit" data-unit="selected">
                    <option value="gram" data-unit="gram">gram</option>
                    <option value="hg" data-unit="hg">hg</option>
                    <option value="kg">kg</option>
                    <option value="liter">liter</option>
                    <option value="dl">dl</option>
                    <option value="ml">ml</option>
                    <option value="msk">msk</option>
                    <option value="tsk">tsk</option>
                    <option value="krm">krm</option>
                    <option value="st">st</option>
                </select>
            </div>
        </div>

        <button class="addIngredientBtn">Lägg till ingredients</button>
        <div>
            <div>
                <label for="description"></label>
                <textarea style="resize: none; margin-top:40px " name="description" id="" cols="68" rows="10"></textarea>
            </div>
            <button type="submit">Skapa recept</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

    <form method="post" action="/addIngredientToDb">
        <h3>Create ingredient</h3>
        <label for="new-ingredient">Ingredient name</label>
        <input type="text" name="new-ingredient">
        <button type="submit">Create Ingredient</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    <a href="javascript:history.back()" type="button">go back</a>
    <script src="/addRecipe.js">
    </script>
</body>

@include("errors")