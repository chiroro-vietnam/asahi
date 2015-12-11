<?php
use App\Http\Models\Categories;

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('', route('homepage'));
});

// Login
Breadcrumbs::register('mem.login', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('로그인', route('frontend.member.login'));
});

// Profile
Breadcrumbs::register('mem.profile', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('옆모습', route('frontend.member.profile'));
});

// Change password
Breadcrumbs::register('mem.changepass', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('암호 변경', route('frontend.member.changepass'));
});


// Reset password
Breadcrumbs::register('mem.resetpass', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('암호를 재설정', route('frontend.member.resetpass'));
});

// Register
Breadcrumbs::register('mem.register', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('레지스터', route('frontend.member.add'));
});

// Search
Breadcrumbs::register('search', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('수색', route('frontend.search'));
});


// Member News
Breadcrumbs::register('mem.news', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('뉴스', route('frontend.page'));
});

// Page
Breadcrumbs::register('page', function ($breadcrumbs, $title) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push($title, route('frontend.member.news'));
});


// Category
Breadcrumbs::register('category', function ($breadcrumbs, $category_cur) {
	$breadcrumbs->parent('home');
	
	//$categories[$category_cur->category_key] = $category_cur->name;
	while(true){
		if ($category_cur->parent != 0){
			$category_cur = Categories::find($category_cur->parent);
			$categories[$category_cur->category_key] = $category_cur->name;
		}else{
			$categories[$category_cur->category_key] = $category_cur->name;
			break;	
		}
	}
	
	$categories = array_reverse($categories);
	foreach($categories as $key => $name){
		$breadcrumbs->push($name, route('frontend.category', $key));
	}
});


// Detail
Breadcrumbs::register('detail', function ($breadcrumbs, $news_info) {
	$category_cur = Categories::find($news_info->category_id);
	
	$breadcrumbs->parent('home');
	$categories[$category_cur->category_key] = $category_cur->name;
	while(true){
		if ($category_cur->parent != 0){
			$category_cur = Categories::find($category_cur->parent);
			$categories[$category_cur->category_key] = $category_cur->name;
		}else{
			$categories[$category_cur->category_key] = $category_cur->name;
			break;	
		}
	}
	
	$categories = array_reverse($categories);
	foreach($categories as $key => $name){
		$breadcrumbs->push($name, route('frontend.category', $key));
	}
});

