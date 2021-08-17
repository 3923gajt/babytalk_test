@extends('layouts.app')
@section('content')

{{-- メッセージ表示 --}}
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

{{$user->name}}さん

<form method="get" action="" enctype="multipart/form-data">
    <label for="title">住んでいる地域：</label>
        <select name="pref[]" class="form-select form-select-sm" aria-label=".form-select-sm example"　size="4" multiple>
            <option selected>都道府県を選ぶ</option>
            <!-- ＄prefをforeachで回す -->
            @foreach($prefs as $pref)
            <option value="{{$pref['id']}}">{{$pref['name']}}</option>
            @endforeach
        </select>

    <label for="title">お子様の年齢：</label>
        <select name="babyage[]" class="form-select form-select-sm" aria-label=".form-select-sm example" size="4" multiple>
            <option selected>年齢を選ぶ</option>
            @foreach($ages as $age)
            <!-- 表示は０際０ヶ月だけどDB(postsテーブル)には$age['id']でid（文字を入れたくないから）をいれる -->
            <option value="{{$age['id']}}">{{$age['age']}}</option>
            @endforeach
        </select>

    <label for="title">いつの話：</label>
        <select name="year[]" id="multiple" class="multiple" multiple="multiple">
            <option selected>年を選択</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
        </select>

        <select name="month[]"　size="4" multiple>
            <option selected>月を選択</option>
            <option value="01">1月</option>
            <option value="02">2月</option>
            <option value="03">3月</option>
            <option value="04">4月</option>
            <option value="05">5月</option>
            <option value="06">6月</option>
            <option value="07">7月</option>
            <option value="08">8月</option>
            <option value="09">9月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
        </select>

    <button type="submit" class="btn btn-success">検索</button>
</form>


@foreach ($posts as $post)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                    <img src="{{asset('storage/avatar/'.($post->user->avatar??'user_default.jpg'))}}"
                        class="rounded-circle" style="width:40px;height:40px;">
                        <div class="media-body ml-3">
                       {{$post->user->name??'削除されたユーザ'}}
                            <div class="text-muted small"> 
                            地域： {{$post->prefecture->name}}
                            子供の年齢： {{$post->babyage_scope->age}}
                            いつの話：{{$post->year}}年
                            {{$post->month}}月
                            </div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            <div><strong>{{$post->created_at->diffForHumans()}}</strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- 地域など表示したい -->
                    <a href="{{route('post.show', $post)}}">
                    {{ Str::limit ("起床時間:".$post->getup_time."  "."朝食内容:".$post->breakfast."  "."午前の過ごし方:".$post->morning_time."  "."昼食内容:".$post->lunch."  "."午後の過ごし方:".$post->after_time."夕食内容:".$post->dinner."就寝時間:".$post->sleep_time.$post->body, 100, ' ...詳細はこちら') }}
                    </a>
                    @if($post->image)
                    <img src="{{asset('storage/images/'.$post->image)}}" class="img-fluid mx-auto d-block" style="width:200px;">
                    @endif
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                    <div class="px-4 pt-3">
                        @if ($post->comments->count())
                        <span class="badge badge-success">
                            コメント{{$post->comments->count()}}件
                        </span>
                    @else
                        <span>コメントはまだありません。</span>
                    @endif
                    </div>
                    <div class="px-4 pt-3"> 
                       <button type="button" class="btn btn-primary">
                          <a href="{{route('post.show', $post)}}" style="color:white;">コメントする</a>
                      </button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection