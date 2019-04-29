@extends('layouts.user') @section('content')

<section class="section-xl bg-periglacial-blue text-center">
    <div class="shell">
        <div class="range range-75">
            <div class="cell-xs-12">
                <h2>OUR EXPERTS</h2>
                <div class="p text-width-medium">
                    <p class="big">We employ only highly qualified Beauty and Spa experts who are not just professionals, but also enjoy maintaining the atmosphere of a classic Beauty and Spa.</p>
                </div>
            </div>
            <div class="cell-xs-12">
                <div class="range range-30">
                    @foreach($empl as $row)
                    <div class="cell-sm-6 cell-md-4 height-fill">
                        <div class="thumbnail-card"><img class="thumbnail-card-image" src="{{ asset('storage/'.$row->image) }}" alt="" width="370" height="310" />
                            <div class="thumbnail-card-body">
                                <p class="thumbnail-card-header" data-toggle="modal" data-target="#modalWindow{{$row->id}}">{{ $row->fname }} {{ $row->lname }}</p>
                                <div class="thumbnail-card-text">
                                    <p>{{ $row->qualification }}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endsection 

@section('modals')
@foreach($empl as $row)                   
<div class="modal fade text-center" id="modalWindow{{$row->id}}" role="dialog">
        <div class="modal-dialog custom-modal-dialog">
            <div class="custom-modal-content">
                <button class="close" type="button" data-dismiss="modal">X</button>
                <div class="shell">
                    <div class="box-portfolio"><img class="box-portfolio-image" src="{{ asset('storage/'.$row->image) }}" alt="" width="130" height="130" />
                        <p class="box-portfolio-header">{{ $row->fname }} {{ $row->lname }}</p>
                        <div class="box-portfolio-text">
                            <p>{{ $row->bio }}</p>

                        </div>
                        <div class="box-portfolio-text">
                          <b>Qualification :  {{ $row->qualification }}</b>
                            
                        </div>
                        <div class="box-portfolio-text">
                        <b>Experience:  {{ $row->experience }} years</b>
                              
                        </div>
                        <ul class="inline-list inline-list-md">
                            <li><a class="icon icon-xs link-gray-base fa-facebook" href="#"></a></li>
                            <li><a class="icon icon-xs link-gray-base fa-twitter" href="#"></a></li>
                            <li><a class="icon icon-xs link-gray-base fa-linkedin" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection