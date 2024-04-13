@extends('layouts.app')

@section('content')

    <div class="container">

        @if (!empty($message))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        

        <div class="row" style="margin-top: 6%;">
            <div class="col">
                <form method="post" action="send-hei-register">
                    @csrf
                    <fieldset>
                        <legend>
                            <p>University Degree Record</p>
                        </legend>

                        <table cellspacing="10">
                            <tr>
                                <td>
                                    <label for="identifier">Identifier: </label>
                                </td>
                                <td align="left">
                                    <input id="identifier" type="text" name="identifier">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="name">Course Name: </label>
                                </td>
                                <td align="left">
                                    <input id="courseName" type="text" name="courseName">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="universityId">University Degree Id: </label>
                                </td>
                                <td align="left">
                                    <input id="universityId" type="text" name="universityId">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date">Date: </label>
                                </td>
                                <td align="left">
                                    <input id="date" type="date" name="date">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="name">Name: </label>
                                </td>
                                <td align="left">
                                    <input id="name" type="text" name="name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="city">City: </label>
                                </td>
                                <td align="left">
                                    <input id="city" type="text" name="city">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="state">State: </label>
                                </td>
                                <td align="left">
                                    <input id="state" type="text" name="state">
                                </td>
                            </tr>
                        </table>
                        <br>
                        <input id="btnSubmit" type="submit" value="Add">
                    </fieldset>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
