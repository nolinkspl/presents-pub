<div class="modal"
     tabindex="-1"
     id="{{ $modalTrigger }}"
     role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Выберите подарок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="hero__form form js-gift-choosing-form"
                      action="{{route('receive-gift', $invite->getCode())}}"
                      method="POST">
                    <div class="form__radio-group">
                        @foreach ($giftTypes as $type)
                            <label class="hero__radio js-gift-choice"
                                   data-is-active="{{ $giftCountsByTypes[$type->name] > 0 ? 1 : 0 }}"
                                   data-gift-type-id="{{ $type->id }}">
                                @if ($giftCountsByTypes[$type->name] > 0)
                                    <input class="hero__radio-orig" type="radio" name="service"/>
                                @endif
                                <span class="hero__radio-notif {{ $type->name }}">
                                    <span class="hero__radio-notif-content">
                                        <img src="/img/gift_type/{{ $type->name }}/notif.png"
                                             alt="Подсказка {{ $type->title }}"/>
                                    </span>
                                </span>
                                <span class="hero__radio-fake">
                                    <img class="unchecked"
                                         src="{{ asset("/img/gift_type/{$type->name}/icon.png") }}"
                                         alt="Логотип {{ $type->title }}"/>
                                        @if ($giftCountsByTypes[$type->name] > 0)
                                            @if ($type->name === 'arzamas')
                                                <div class="checked"></div>
                                            @else
                                                <img class="checked"
                                                 src="{{ asset("/img/gift_type/{$type->name}/icon_checked.png") }}"
                                                 alt="Логотип {{ $type->title }}"/>
                                            @endif
                                        @endif
                                </span>
                            </label>
                        @endforeach
                    </div>
                    <input hidden name="gift_type_id" class="js-gift-type-id-input">
                    <div class="form__group">
                        <input type="email" name="email" required/>
                        <button type="submit">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                width="123.97px"
                                height="123.97px"
                                viewBox="0 0 123.97 123.97"
                                style="enable-background: new 0 0 123.97 123.97"
                                xml:space="preserve"
                            >
										<g>
                                            <path
                                                d="M27.961,99.367c-5.8,5.8-5.7,15.3,0.5,20.899c5.8,5.301,14.8,4.801,20.3-0.8l47.3-47.3c2.8-2.8,4.2-6.5,4.2-10.2
		s-1.4-7.399-4.2-10.2l-47.2-47.3c-5.5-5.5-14.6-6.1-20.3-0.8c-6.1,5.6-6.3,15.1-0.5,20.9l30.2,30.399c3.9,3.9,3.9,10.2,0,14.101
		L27.961,99.367z"
                                            />
                                        </g>
									</svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                width="123.97px"
                                height="123.97px"
                                viewBox="0 0 123.97 123.97"
                                style="enable-background: new 0 0 123.97 123.97"
                                xml:space="preserve"
                            >
										<g>
                                            <path
                                                d="M27.961,99.367c-5.8,5.8-5.7,15.3,0.5,20.899c5.8,5.301,14.8,4.801,20.3-0.8l47.3-47.3c2.8-2.8,4.2-6.5,4.2-10.2
		s-1.4-7.399-4.2-10.2l-47.2-47.3c-5.5-5.5-14.6-6.1-20.3-0.8c-6.1,5.6-6.3,15.1-0.5,20.9l30.2,30.399c3.9,3.9,3.9,10.2,0,14.101
		L27.961,99.367z"
                                            />
                                        </g>
									</svg>
                        </button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <h2 class="hero__subtitle">
                    Выберите подарок, введите почту, на которую Вам будет отправлен код активации.
                </h2>
            </div>
        </div>
    </div>
</div>
