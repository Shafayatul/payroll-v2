@extends('layouts.admin.master')
@section('title', "FeedbackCategoryAttribute $feedbackcategoryattribute->name")
@section('admin-additional-css')
<style type="text/css">
    .table th{
        border: 1px solid #dee2e6;
    }
</style>
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">FeedbackCategoryAttribute</a></li>
            <li class="breadcrumb-item active">FeedbackCategoryAttribute {{ $feedbackcategoryattribute->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">FeedbackCategoryAttribute {{ $feedbackcategoryattribute->name }}</div>
            <div class="card-body">

                <a href="{{ url('/feedback-category-attributes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/feedback-category-attributes/' . $feedbackcategoryattribute->id . '/edit') }}" title="Edit FeedbackCategoryAttribute"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['feedback-category-attributes', $feedbackcategoryattribute->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete FeedbackCategoryAttribute',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $feedbackcategoryattribute->id }}</td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $feedbackcategoryattribute->name }} </td>
                            </tr>
                            <tr>
                                <th> Is Required </th>
                                <td> 
                                    @if($feedbackcategoryattribute->is_required == 1)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th> Feedback Category </th>
                                <td>
                                    @isset($feedback_categories[$feedbackcategoryattribute->feedback_category_id]) 
                                        {{ $feedback_categories[$feedbackcategoryattribute->feedback_category_id] }}
                                    @endisset 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
@endsection