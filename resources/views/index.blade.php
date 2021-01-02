@extends('layouts.app')

@section('content')


  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <section class="top">
  <h1 class="top_ttl">
    <img
      src="<?= get_template_directory_uri(); ?>/assets/images/top_ttl.png"
      srcset="<?= get_template_directory_uri(); ?>/assets/images/top_ttl.png 1x, <?= get_template_directory_uri(); ?>/assets/images/top_ttl@2x.png 2x"
      width="244"
      alt="AcuticNotes"
    >
    </h1>
    
  </section>
  <section class="works">
<h2 class="works_ttl">
<img
      src="<?= get_template_directory_uri(); ?>/assets/images/works_ttl.png"
      srcset="<?= get_template_directory_uri(); ?>/assets/images/works_ttl.png 1x, <?= get_template_directory_uri(); ?>/assets/images/works_ttl@2x.png 2x"
      alt="AcuticNotes"
    >
</h2>
<div class="works_list">
@while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile
  </div>
  </section>
  <section class="about">
<h2 class="about_ttl">
<img
      src="<?= get_template_directory_uri(); ?>/assets/images/about_ttl.png"
      srcset="<?= get_template_directory_uri(); ?>/assets/images/about_ttl.png 1x, <?= get_template_directory_uri(); ?>/assets/images/about_ttl@2x.png 2x"
      alt="ABOUT US"
    >
</h2>
<div class="about_cont">
  <div class="about_contImg">
  <img
      src="<?= get_template_directory_uri(); ?>/assets/images/about_img.png"
      srcset="<?= get_template_directory_uri(); ?>/assets/images/about_img.png 1x, <?= get_template_directory_uri(); ?>/assets/images/about_img@2x.png 2x"
      alt=""
    >
  </div>
  <div class="about_desc">
    私達『AcuticNotes』(アキューティックノーツ)は、
    映像と音による「視覚」と「聴覚」で魅せる作品を製作していくサークルです。
    AcuticNotesとは、より鋭利で、人々の感覚に鋭く(=acute)潜り込むような作品を目指し、
    それらの作品群（=notes)を多様に表し、
    画一的なイメージの枠から脱した様々な表現をしようという思いが込められています。
    サウンド担当のAｎと、グラフィックス担当のレクによって成り立っており、
    様々な角度から解釈できるような作品を展開していこう、という趣旨から結成されました。
  </div>
</div>
  </section>
  <section class="member">
<h2 class="member_ttl">
<img
      src="<?= get_template_directory_uri(); ?>/assets/images/member_ttl.png"
      srcset="<?= get_template_directory_uri(); ?>/assets/images/member_ttl.png 1x, <?= get_template_directory_uri(); ?>/assets/images/member_ttl@2x.png 2x"
      alt="MEMBER"
    >
</h2>
<ul class="member_list">
  <li class="member_item">
    <div class="member_info">
      <div class="member_info_1">
        (thumb)
      </div>
      <div class="member_info_2">
        <p class="member_position">Composer</p>
        <h3 class="member_name">
          An
        </h3>
        <ul class="member_linkList">
          <li class="member_linkItem">
            <a href="" class="member_link">
              twitter
            </a>
          </li>
          <li class="member_linkItem">
            <a href="" class="member_link">
              twitter
            </a>
          </li>
          <li class="member_linkItem">
            <a href="" class="member_link">
              twitter
            </a>
          </li>
        </ul>
      </div>
    </div>
      <p class="member_desc">
      高校時代にonoken氏の『felys -long mix-』と出会い、多大な影響を受け、2009年に音楽製作を開始する。ArtCoreを主軸とした楽曲製作を得意としており、時にその他のジャンルの要素をクロスオーバーさせるスタイルには他の者には真似できない独特のセンスを持つ。
2011年にはDiverse Systemの楽曲公募に通過、自身のソロアルバムの発売、高評価を得るなどAnにとって飛躍の年となった。
ピアノを中心に奏でられるAnの旋律は、リスナーの琴線に触れるような感動を与えてくれるだろう。

      </p>
    </li>
    <li class="member_item">
      <div class="member_info">
        <div class="member_info_1">
          (thumb)
        </div>
        <div class="member_info_2">
        <p class="member_position">Composer</p>
        <h3 class="member_name">
          An
        </h3>
        <ul class="member_linkList">
          <li class="member_linkItem">
            <a href="" class="member_link">
              twitter
            </a>
          </li>
          <li class="member_linkItem">
            <a href="" class="member_link">
              twitter
            </a>
          </li>
          <li class="member_linkItem">
            <a href="" class="member_link">
              twitter
            </a>
          </li>
        </ul>
      </div>
    </div>
    <p class="member_desc">
      高校時代にonoken氏の『felys -long mix-』と出会い、多大な影響を受け、2009年に音楽製作を開始する。ArtCoreを主軸とした楽曲製作を得意としており、時にその他のジャンルの要素をクロスオーバーさせるスタイルには他の者には真似できない独特のセンスを持つ。
2011年にはDiverse Systemの楽曲公募に通過、自身のソロアルバムの発売、高評価を得るなどAnにとって飛躍の年となった。
ピアノを中心に奏でられるAnの旋律は、リスナーの琴線に触れるような感動を与えてくれるだろう。

      </p>
    </li>
  </ul>
  </section>

  <section class="twitter">
    <h2 class="twitter_ttl">AcuticNotes official twitter</h2>
    <a href="" class="twitter_link">@AcuticNotes__JP</a>
  </section>


  {!! get_the_posts_navigation() !!}
@endsection
