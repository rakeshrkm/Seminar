<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});



Breadcrumbs::for('registers', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Student Lists', route('registers.index'));
});

Breadcrumbs::for('registers_create', function (BreadcrumbTrail $trail) {
    $trail->parent('registers');
    $trail->push('Add Student', route('registers.create'));
});

Breadcrumbs::for('registers_Edit', function (BreadcrumbTrail $trail) {
    $trail->parent('registers');
    $trail->push('Edit Student');
});

Breadcrumbs::for('registers_view', function (BreadcrumbTrail $trail) {
    $trail->parent('registers');
    $trail->push('View Student');
});


Breadcrumbs::for('courses', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Courses Lists', route('courses.index'));
});

Breadcrumbs::for('courses_create', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Create Course', route('courses.create'));
});

Breadcrumbs::for('courses_edit', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Edit Course');
});


Breadcrumbs::for('college', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('College Lists', route('college.index'));
});

Breadcrumbs::for('college_create', function (BreadcrumbTrail $trail) {
    $trail->parent('college');
    $trail->push('Create College', route('college.create'));
});

Breadcrumbs::for('college_edit', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Edit College');
});
