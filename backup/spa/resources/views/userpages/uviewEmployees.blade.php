@extends('layouts.user') @section('content')
<div class="container">
<div class="col-md-10">
            
              <center>  <div class="card-header"><h1><i>CHOOSE OUR SPECIALISTS</i></h1></div></center>
            
            <div class="row">
            @foreach($empl as $row)
                <div class="col-md-2">
            
                <div class="page">
                <div class="page__container">
                    <article class="profile">
                        <header class="profile__header">
                            <img src={{ asset('storage/'.$row->image) }} class="profile__avatar" alt="avatar of Stas Melnikov">
                            <h3 class="profile__name">{{ $row->fname }}</h3>
                            <span class="profile__post">{{ $row->number }}</span>
                        </header>
                        <div class="profile__stats">
                            <div class="profile_group px-3">
                                <div class="profile_param">
                                {{ $row->name }}
                                </div>
                            </div>
                        </div>
                        <form class="login100-form validate-form" method="POST" action="{{ route('viewdate') }}">
                    @csrf
                    <input hidden name="eid" value="{{ $row->id}}">
                    <input hidden name="pid" value="{{ $pack[0]['id']}}">    
                     <button type="submit" class="submit">Choose</button>
                 </form>
                    </article>
                </div>
            </div>
            <svg width="26" height="28" style="display: none;">
                <symbol id="twitter" viewBox="0 0 26 28">
                    <path d="M25.312 6.375c-0.688 1-1.547 1.891-2.531 2.609 0.016 0.219 0.016 0.438 0.016 0.656 0 6.672-5.078 14.359-14.359 14.359-2.859 0-5.516-0.828-7.75-2.266 0.406 0.047 0.797 0.063 1.219 0.063 2.359 0 4.531-0.797 6.266-2.156-2.219-0.047-4.078-1.5-4.719-3.5 0.313 0.047 0.625 0.078 0.953 0.078 0.453 0 0.906-0.063 1.328-0.172-2.312-0.469-4.047-2.5-4.047-4.953v-0.063c0.672 0.375 1.453 0.609 2.281 0.641-1.359-0.906-2.25-2.453-2.25-4.203 0-0.938 0.25-1.797 0.688-2.547 2.484 3.062 6.219 5.063 10.406 5.281-0.078-0.375-0.125-0.766-0.125-1.156 0-2.781 2.25-5.047 5.047-5.047 1.453 0 2.766 0.609 3.687 1.594 1.141-0.219 2.234-0.641 3.203-1.219-0.375 1.172-1.172 2.156-2.219 2.781 1.016-0.109 2-0.391 2.906-0.781z"></path>
                </symbol>
                <symbol id="codepen" viewBox="0 0 28 28">
                    <path d="M3.375 18.266l9.422 6.281v-5.609l-5.219-3.484zM2.406 16.016l3.016-2.016-3.016-2.016v4.031zM15.203 24.547l9.422-6.281-4.203-2.812-5.219 3.484v5.609zM14 16.844l4.25-2.844-4.25-2.844-4.25 2.844zM7.578 12.547l5.219-3.484v-5.609l-9.422 6.281zM22.578 14l3.016 2.016v-4.031zM20.422 12.547l4.203-2.812-9.422-6.281v5.609zM28 9.734v8.531c0 0.391-0.203 0.781-0.531 1l-12.797 8.531c-0.203 0.125-0.438 0.203-0.672 0.203s-0.469-0.078-0.672-0.203l-12.797-8.531c-0.328-0.219-0.531-0.609-0.531-1v-8.531c0-0.391 0.203-0.781 0.531-1l12.797-8.531c0.203-0.125 0.438-0.203 0.672-0.203s0.469 0.078 0.672 0.203l12.797 8.531c0.328 0.219 0.531 0.609 0.531 1z"></path>
                </symbol>
                <symbol id="linkedin" viewBox="0 0 24 28">
                    <path d="M5.453 9.766v15.484h-5.156v-15.484h5.156zM5.781 4.984c0.016 1.484-1.109 2.672-2.906 2.672v0h-0.031c-1.734 0-2.844-1.188-2.844-2.672 0-1.516 1.156-2.672 2.906-2.672 1.766 0 2.859 1.156 2.875 2.672zM24 16.375v8.875h-5.141v-8.281c0-2.078-0.75-3.5-2.609-3.5-1.422 0-2.266 0.953-2.641 1.875-0.125 0.344-0.172 0.797-0.172 1.266v8.641h-5.141c0.063-14.031 0-15.484 0-15.484h5.141v2.25h-0.031c0.672-1.062 1.891-2.609 4.672-2.609 3.391 0 5.922 2.219 5.922 6.969z"></path>
                </symbol>
            </svg>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection