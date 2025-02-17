@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Classes')

<link rel="stylesheet" href="{{ asset('sass/classes/classesCourse/classes.css') }}">


@section('content')

<div class="container">
    <table>
        <thead>
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Start Time') }}</th>
                <th>{{ __('PDF') }}</th>
                <th>{{ __('PPT') }}</th>
                <th>{{ __('Video') }}</th>
                <th>{{ __('Meet') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
            <tr>
                <form action="{{ route('classes.update', $class->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <td>
                        <input type="text" name="title" value="{{ old('title', $class->title) }}">
                    </td>
                    <td>
                        <input type="date" name="date" value="{{ old('date', $class->date) }}">
                    </td>
                    <td>
                        <input type="time" name="start_time" value="{{ old('start_time', $class->start_time) }}">
                    </td>
                    <td>
                        <input type="text" name="pdf" value="{{ old('pdf', $class->pdf) }}">
                    </td>
                    <td>
                        <input type="text" name="ppt" value="{{ old('ppt', $class->ppt) }}">
                    </td>
                    <td>
                        <input type="text" name="video" value="{{ old('video', $class->video) }}">
                    </td>
                    <td>
                        <input type="text" name="meet" value="{{ old('meet', $class->meet) }}">
                    </td>
                    <td>
                        <button type="submit" class="btnUpdateClass">{{ __('Update') }}</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
