@extends('layouts.master')

@section('tab-title')
  <title>Portfolio</title>

@section('content')
    <div class='container main-container'>
    <div class="page-header">
      <h1>Ivan Andres Abad <small>My Portfolio</small></h1>
    </div>
    <div class='row'>
      <div class='col-md-6'>
        <img class='img-responsive' alt="Blackjack Web App" src="img/.png" style="display: inline-block; padding: 5px; background-color: #555; border: solid #000 2px;" />
      </div>
      <div class='col-md-6' style='vertical-align: center;'>
        <h3><strong>BLACKJACK</strong></h3>
        <h4>or 21</h4>
        <p>Web application for the card game Blackjack written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
        <a href="blackjack.php" class="btn btn-success btn-md" role="button">Blackjack</a>
      </div>
    </div>
    <hr>
    <div class='row'>
      <div class='col-md-3'>
        <img class='img-responsive' src="img/Connect-Four.png" alt='Connect Four Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
      </div>
      <div class='col-md-9'>
        <h4><strong>CONNECT FOUR</strong></h4>
        <p>Web application for Connect Four written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
        <a href="connect-four.php" class='btn btn-success btn-sm'>Connect Four</a>
      </div>
    </div>
    <br>
    <div class='row'>
      <div class='col-md-3'>
        <img class='img-responsive' src="img/Yahtzee.png" alt='Yahtzee Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
      </div>
      <div class='col-md-9'>
        <h4><strong>YAHTZEE</strong></h4>
        <p>Web application for the dice game Yahtzee written in php during my enrollment in Codeup's LAMP+J Bootcamp</p>
        <a href="yahtzee.php" class='btn btn-success btn-sm'>Yahtzee</a>
      </div>
    </div>
    <br>
    <div class='row'>
      <div class='col-md-3'>
        <img class='img-responsive' src="img/todo-list.png" alt='Todo List Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
      </div>
      <div class='col-md-9'>
        <h4><strong>TODO LIST</strong></h4>
        <p>Todo list web application. Will have link working once I update it to allow any visitor to the page have a login with a todo list file for their login information</p>
        <a href="todo-list.php" class='btn btn-success btn-sm' disabled='disabled'>Todo List</a>
      </div>
    </div>
    <br>
    <div class='row'>
      <div class='col-md-3'>
        <img class='img-responsive' src="img/address-book.png" alt='Address Book Web App' style="padding: 3px; background-color: #555; border: solid #000 2px; display: inline-block;">
      </div>
      <div class='col-md-9'>
        <h4><strong>ADDRESS BOOK</strong></h4>
        <p>Address book web application written with php. Will have link working when it works with login info like the todo web application</p>
        <a href="address_book.php" class='btn btn-success btn-sm' disabled='disabled'>Address Book</a>
      </div>
    </div>
  </div>

@stop