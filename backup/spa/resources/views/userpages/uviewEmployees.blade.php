@extends('layouts.service') 
@section('content')
       <section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
              <div class="shell"><a class="link link-primary link-return" href="/user/view/service">Back</a></div>
              <div class="shell">
                <h2>CHOOSE OUR PROFESSIONALS</h2>
                <div class="p text-width-medium">
                  <p class="big">Barbershop offers professional services of certified barbers with years of experience. On this page you can choose a preferred barber in a few clicks.</p>
                </div>
                <div class="range range-lg-center">
                  <div class="cell-lg-10">
                    <div class="range range-sm-center range-md-left range-30">
                    
                      <div class="cell-sm-8 cell-md-6">
                        <div class="thumbnail-option">
                        @foreach($empl as $row)
                          <div class="thumbnail-option-left"><img src="{{ asset('storage/'.$row->image) }}" alt="" width="170" height="180"/>
                          </div>
                          <div class="thumbnail-option-body">
                            <div class="thumbnail-option-title">{{ $row->fname }}  {{ $row->lname }}</div>
                            <ul class="thumbnail-option-list">
                              <li class="active">mo</li>
                              <li class="active">tu</li>
                              <li class="active">we</li>
                              <li class="active">th</li>
                              <li class="active">fr</li>
                              <li class="active">st</li>
                              <li class="active">sn</li>
                            </ul>
                            <div><form class="login100-form validate-form" method="POST" action="{{ route('viewdate') }}">
                             @csrf
                             <input hidden name="eid" value="{{ $row->id}}">
                            <input hidden name="pid" value="{{ $pack[0]['id']}}">    
                            <button type="submit" class="btn btn-xs btn-primary btn-circle">Choose</button>
                             </form>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

           </div> 
    
@endsection
















