<!----
This block contains starter structure to display multiple contacts for each community.
-->

  <!-- Agent Information for Coyote Ranch -->
  @if(is_singular('coyote-ranch'))
  @while( have_rows('agent_information','options') ) @php the_row() @endphp
  @php
  $coyote_agent = get_sub_field('assigned_agents_one','options');
  $coyote_agent_phone = get_sub_field('agent_phone_number_one','options');
  $coyote_agent_email = get_sub_field('agent_email_one','options');
  @endphp

  <div class="property__contact--agent">
    <strong>Agent: {!! $coyote_agent !!}</strong>
    <br><a class="cw tele__agent" href="tel:{!! preg_replace('/[^0-9]/', '', $coyote_agent_phone); !!}"><strong>{!! $coyote_agent_phone !!}</strong></a>
    <br><a class="email__agent" href="mailto:{!! $coyote_agent_email !!}">{!! $coyote_agent_email !!}</a>
  </div>
  @endwhile
  @endif

  <!-- Agent Information for Tuscany MH Park Ranch -->
  @if(is_singular('tuscany-park'))
  @while( have_rows('agent_information_two','options') ) @php the_row() @endphp
  @php
  $tuscany_agent = get_sub_field('assigned_agents_two','options');
  $tuscany_agent_phone = get_sub_field('agent_phone_number_two','options');
  $tuscany_agent_email = get_sub_field('agent_email_two','options');
  @endphp
  <div class="property__contact--agent">
    <strong>Agent: {!! $tuscany_agent !!}</strong>
    <br><a class="cw tele__agent" href="tel:{!! preg_replace('/[^0-9]/', '', $tuscany_agent_phone); !!}"><strong>{!! $tuscany_agent_phone !!}</strong></a>
    <br><a class="email__agent" href="mailto:{!! $tuscany_agent_email !!}">{!! $tuscany_agent_email !!}</a>
  </div>
  @endwhile
  @endif

  <!-- Agent Information for Cactus Ranch -->
  @if(is_singular('cactus-ranch'))
  @while( have_rows('agent_information_three','options') ) @php the_row() @endphp
  @php
  $cactus_agent = get_sub_field('assigned_agents_three','options');
  $cactus_agent_phone = get_sub_field('agent_phone_number_three','options');
  $cactus_agent_email = get_sub_field('agent_email_three','options');
  @endphp
  <div class="property__contact--agent">
    <strong>Agent: {!! $cactus_agent !!}</strong>
    <br><a class="cw tele__agent" href="tel:{!! preg_replace('/[^0-9]/', '', $cactus_agent_phone); !!}"><strong>{!! $cactus_agent_phone !!}</strong></a>
    <br><a class="email__agent" href="mailto:{!! $cactus_agent_email !!}">{!! $cactus_agent_email !!}</a>
  </div>
  @endwhile
  @endif

  <!-- Agent Information for Rialto -->
  @if(is_singular('ranch-rialto'))
  @while( have_rows('agent_information_four','options') ) @php the_row() @endphp
  @php
  $rialto_agent = get_sub_field('assigned_agents_four','options');
  $rialto_agent_phone = get_sub_field('agent_phone_number_four','options');
  $rialto_agent_email = get_sub_field('agent_email_four','options');
  @endphp
  <div class="property__contact--agent">
    <strong>Agent: {!! $rialto_agent !!}</strong>
    <br><a class="cw tele__agent" href="tel:{!! preg_replace('/[^0-9]/', '', $rialto_agent_phone); !!}"><strong>{!! $rialto_agent_phone !!}</strong></a>
    <br><a class="email__agent" href="mailto:{!! $rialto_agent_email !!}">{!! $rialto_agent_email !!}</a>
  </div>
  @endwhile
  @endif

  <!-- Agent Information for Araby Acres -->
  @if(is_singular('araby-acres'))
  @while( have_rows('agent_information_five','options') ) @php the_row() @endphp
  @php
  $araby_agent = get_sub_field('assigned_agents_five','options');
  $araby_agent_phone = get_sub_field('agent_phone_number_five','options');
  $araby_agent_email = get_sub_field('agent_email_five','options');
  @endphp
  <div class="property__contact--agent">
    <strong>Agent: {!! $araby_agent !!}</strong>
    <br><a class="cw tele__agent" href="tel:{!! preg_replace('/[^0-9]/', '', $araby_agent_phone); !!}">{!! $araby_agent_phone !!}</a>
    <br><a class="email__agent" href="mailto:{!! $araby_agent_email !!}">{!! $araby_agent_email !!}</a>
  </div>
  @endwhile
  @endif
