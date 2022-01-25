<?php

public function store(Request $request) {
    // 1. La validation
    $this->validate($request, [
        "serial" => 'bail|required|string|max:255',
        "power" => 'bail|required|image|max:1024',
        "color" => 'bail|required',
    ]);

    // 2. On enregistre les informations du Post
    Post::create([
        "serial" => $request->serial,
        "power" => $request->power,
        "color" => $request->color,
    ]);

    // 4. On retourne vers tous les posts : route("posts.index")
    return redirect(route("cars.list"));
}


?>