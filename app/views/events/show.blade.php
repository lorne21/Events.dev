@extends('layouts.master')

<style type="text/css">
*{
  border:0;
  font:inherit;
  font-size:100%;
  vertical-align:baseline;
  margin:0;
  padding:0;
  -webkit-box-sizing: border-box; 
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
body {
  font:16px 'PT Sans Narrow', Helvetica, Arial, sans-serif;
  font-weight:400;
  background-color:#ffffff;
  color:#ffffff;
}

ol,ul {
  list-style:none;
  list-style-image:none;
  list-style-position:outside;
  list-style-type:none;
}

img {
  border:none;
  max-width:100%;
}

a img {
  border:none;
}

a {
  color:#ffffff;
  text-decoration:underline;
  outline:none;
}

a:hover,a:focus {
  color:#333333;
  text-decoration:underline;
}

p {
  margin:0 0 10px;
}

header h1 {
  margin:30px 0 0;
}

header h1 a {
  font-size:30px;
  text-transform:uppercase;
  color:#333333;
  text-decoration:none;
}

header h1 a:hover {
  color:#00aba9;
  text-decoration:none;
}

header h2 {
  color:#333;
  font-size:22px;
  margin:10px 0 0;
}

h3 {
  font-size:26px;
  font-weight:400;
  margin:0 0 20px;
}

/* 8 Column Grid 
----------------------------------------------------------------------------- 

Span 1:    9.875%
Span 2:    22.75%
Span 3:    35.625%
Span 4:    48.5%
Span 5:    61.375%
Span 6:    74.25%
Span 7:    87.125%
Span 8:    100%

----------------------------------------------------------------------------- */

.column {
  margin-left:3%;
  padding:0 0%;
  float:left;
}

.column:first-child {
    margin-left:0;
}

.col1 {
    width:9.875%;
}
.col2 {
    width:22.75%;
}
.col3 {
    width:35.625%;
}
.col4 {
    width:48.5%;
}
.col5 {
    width:61.375%;
}
.col6 {
    width:74.25%;
}
.col7 {
    width:87.125%;
}
.col8 {
    margin-left:0;
    width:100%;
}

.pl-50 {
  padding-left:50px;
}

.pl-30 {
  padding-left:30px;
}

#mainwrap {
  overflow:hidden;
  position:relative;
  width:840px;
  margin:0 auto;
}

#content {
  height:400px;
  overflow:hidden;
  position:relative;
}

#pagecontainer {
  position:relative;
  width:9999px;
}

.section {
  float:left;
  height:400px;
  margin-right:50px;
  position:relative;
  width:100%;
  padding:30px;
  overflow:hidden;
}

#profile {
  background-color: #00aba9;
  overflow-y:scroll;
}

#resume {
  background-color: #76608a;
  overflow-y:scroll;
}

#contact {
  background-color: #f0a30a;
}

#menu {
  margin-top:30px;
  overflow:hidden;
}

#menu li {
  display:block;
  float:left;
  width:32.666%;
  margin-left:1%;
  position:relative;
}

#menu li:first-child {
  margin-left:0;
}

#menu li a {
  display:block;
  height:42px;
  line-height:42px;
  color:#333;
  font-size:18px;
  text-align:center;
  text-decoration:none;
  text-transform:uppercase;
  margin-top:20px;
  background-color:#e6e6e6;
}

#menu li span {
  display:none;
  color: white;
}

#menu li.active span {
  display:block;
  position:absolute;
  bottom:2px;
  width:100%;
  text-align:center;
  line-height:14px;
}

#menu li.active a {
  line-height:43px;
  height:62px;
  margin-top:0;
  color:#ffffff;
}

#menu li.active a.profile {
  background-color:#00aba9;
}

#menu li.active a.resume {
  background-color:#76608a;
}

#menu li.active a.contact {
  background-color:#f0a30a;
}

#menu li a:hover {
  text-decoration:none;
  background-image:none;
}

#menu li.active a {
  text-decoration:none;
}

#bioinfo {
  width:100%;
  border-collapse: collapse;
  color: white;
}
#bioinfo tr td {
  padding:5px 10px;
}

#bioinfo .odd {
  background: rgba(0,0,0,0.5);
  border-right:1px solid #00aba9;
  border-bottom:1px solid #00aba9;
}

#bioinfo .even {
  background: rgba(0,0,0,0.3);
  border-bottom:1px solid #00aba9;
}

.social {
  overflow:hidden;
  padding:0;
  margin:20px 0 0;
}

.social li {
  display:block;
  float:left;
  height:36px;
  width:36px;
  margin:0 10px 10px 0;
  opacity: 0.5
}

#cv {
  margin:0;
  padding:0;
  border-collapse: collapse;
}

#cv .date {
  position: relative;
  padding: 10px;
  color: #ffffff;
  background: rgba(0,0,0,0.5);
}

/* creates triangle */
#cv .date:after {
  content: "";
  display: block; /* reduce the damage in FF3.0 */
  position: absolute;
  right: -10px;
  top: 50%;
  width: 0;
  border-width: 10px 0 10px 10px;
  border-style: solid;
  border-color: transparent rgba(0,0,0,0.5);
  margin-top:-10px;
}

#cv .company {
  font-size:28px;
  margin:0;
  padding:0;
}

#cv .title {
  font-size:22px;
  margin:0;
  padding:0;
}

#cv .description {
  font-size:15px;
  margin:10px 0 30px;
  padding:0;
}

#contactform label {
  width:100%;
  display:block;
}

#contactform input,
#contactform textarea {
  width:100%;
  background-color:rgba(0,0,0,0.5);
  color:white;
  border:none;
  padding:5px;
}

#contactform input.button {
  background-color:#fa6800;
  padding:10px;
  width:auto;
  float:right;
  cursor:pointer;
}

#footer {
  color:#999;
  text-align:center;
  width:100%;
  padding-top:20px;
  margin-top:-2px;
}

#footer a {
  color:#999;
}

#band{
  color:white;
}

#map-canvas {
  width: 100%;
  height: 300px;
}

@media screen and (max-width:850px) {
  #mainwrap {
    width:95%;
  }

  #content,
  .section {
    height:auto;
  }
}

@media screen and (max-width:479px) {
  .section {
    padding:15px;
  }

  .column {
    margin-left:0 0%;
    padding:0 0%;
    float:none;
  }

  .col1,
  .col2,
  .col3,
  .col4,
  .col5,
  .col6,
  .col7,
  .col8 {
      margin-left:0;
      width:100%;
  }

  #cv .col2 {
    width: 22.75% !important;
    max-width:100px !important;
  }
  #cv .col6 {
    width: auto !important;
  }

  #menu li.active span {
    display:none;
  }

}
</style>

@section('content')

<div id="mainwrap" ng-app="angularManage" ng-controller="ManageController" ng-init="loadEvent({{ $event->id }})">

    <header>
      <h1><a href="/" class="band">@{{ event.title }}</a></h1>
      <ul id="menu">
        <li><a class="profile" href="#profile" title="Profile">Details</a><span class="band">The When</span></li>
        <li><a class="resume" href="#resume" title="Resume">The Band</a><span class="band">The Who</span></li>
        
        <li><a class="contact" href="#contact" title="Contact">Location</a><span class="band">The Where</span></li>
      </ul>
    </header>
    <div style="clear:both"></div>
    <div id="content">
      <div id="profile" class="section">
        <div class="column col3">
          <table id="bioinfo">
            <tbody>
              <tr>
                <td class="odd">Name</td>
                <td class="even">@{{ event.title }}</td>
              </tr>
              <tr>
                <td class="odd">Date</td>
                <td class="even">@{{ event.date | phpDate : "MMMM D, YYYY" }}</td>
              </tr>
              <tr>
                <td class="odd">Start Time</td>
                <td class="even">@{{ event.start_time | phpDate : "h:mm a" }}</td>
              </tr>
              @if(!empty($event->end_time))
                <tr>
                <td class="odd">End Time</td>
                <td class="even">@{{ event.end_time }}</td>
                </tr>
              @endif
              <tr>
                <td class="odd">Price</td>
                <td class="even">@{{ event.price | currency }}</td>
              </tr>
              <tr>
                <td class="odd">About</td>
                <td class="even">@{{ event.description }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="column col5 pl-50">
          <img src="{{ $event->img }}" alt="" />
        </div>
      </div>

      <div id="resume" class="section">
        <div class="column col3">
          <table id="bioinfo">
            <tbody>
              <tr>
                <td class="odd">Band Name</td>
                <td class="even">{{ $event->user->band_name }}</td>
              </tr>
              <tr>
                <td class="odd">Genre</td>
                <td class="even">{{ $event->user->genre }}</td>
              </tr>
              <tr>
                <td class="odd">About</td>
                <td class="even">{{ $event->user->about }} <a href="#">View the Band Page</a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="column col5 pl-50">
          <img src="{{ $event->user->img }}" alt="" />
        </div>

      </div>

      <div id="contact" class="section">
        <div class="column col3">
          <table id="bioinfo">
            <tbody>
              <tr>
                <td class="odd">Location</td>
                <td class="even">@{{ event.location }}</td>
              </tr>
              <tr>
                <td class="odd">Address</td>
                <td class="even">@{{ event.address }}</td>
              </tr>
              <tr>
                <td class="odd">City</td>
                <td class="even">@{{ event.city }}</td>
              </tr>
              <tr>
                <td class="odd">State</td>
                <td class="even">@{{ event.state }}</td>
              </tr>
              <tr>
                <td class="odd">Zip</td>
                <td class="even">@{{ event.zip }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="column col5 pl-50">
          <div id="map-canvas"></div>
          {{-- <img src="{{ $event->user->img }}" alt="" /> --}}
        </div>
      </div>
    </div>

    
  </div>


<script src="/js/moment.js"></script>
<script src="/js/moment-timezone-with-data-2010-2020.js"></script>
<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript" src="/js/angularManage.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACIJL0I_4DPWkoa7BKdBdm2DnDtmZ56I4"></script>



@stop