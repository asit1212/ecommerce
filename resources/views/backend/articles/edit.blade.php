@extends('layouts.backend.master')

@section('header')
    @parent
    <title>Update article</title>
@stop

@section('content')
    <div class="row admin-form">
        <h2>Add a new article</h2>

        <p>For now, you can only create help articles</p>
        <hr/>
        <div class="msgDisplay m-t-10"></div>
        {!! Form::model($article, ['url' => route('backend.articles.update', ['article' => $article->id]), 'method' => 'PATCH']) !!}
        <div class="col-md-6">

            @include('_partials.forms.Articles.help.form')
            <hr/>
            <div class="pull-left">
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok-sign"></span> update article
                </button>
            </div>
            <div class="pull-right">
                <a href="#" data-toggle="modal" data-target="#deleteArticle{{ $article->id }}">
                    <button class="btn btn-danger" data-title="Delete">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @include('_partials.modals.actionModals.delete', ['elementID' => 'deleteArticle'.$article->id, 'route' => route('backend.articles.destroy', ['id' => $article->id])])
@stop