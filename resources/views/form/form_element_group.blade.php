<div id="element_type_group" style="display:none;overflow: visible;">
	<p class="search">
		<span class="img"> </span>
		<span class="input"><input type="text" placeholder="Search Element"></span>
	</p>

	<p data-label="Name" data-type="name" class="element" data-attribute="NAME" >
		<img class="gray" src="{{ asset('/iconSVG/profile-1336.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/profile-1336-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/profile-1336-copy-2.svg') }}" >Name
	</p>

	<p data-label="Email Address" data-type="email" class="element" data-attribute="EMAIL">
		<img class="gray" src="{{ asset('/iconSVG/email-1571.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/email-1571-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/email-1571-copy-2.svg') }}" >Email
	</p>

	<p data-label="Phone Number" data-type="phone" class="element" data-attribute="PHONE">
		<img class="gray" src="{{ asset('/iconSVG/phone-227.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/phone-227-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/phone-227-copy-2.svg') }}" >Phone Number
	</p>

	<p class="element" data-label="Text" data-type="text" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/text-style-1210.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/text-style-1210-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/text-style-1210-copy-2.svg') }}" >Text Box
	</p>

	<p class="element" data-label="Textarea" data-type="textarea" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/ic-texture-24-px.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/ic-texture-24-px-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/ic-texture-24-px-copy-2.svg') }}" >Text Area
	</p>

	<p class="element" data-label="Dropdown" data-type="select" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/download-1452.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/download-1452-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/download-1452-copy-2.svg') }}" >Dropdown
	</p>

	<p class="element" data-label="Dropdown" data-type="checkbox" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/done-1476.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/done-1476-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/done-1476-copy-2.svg') }}" >Checkbox
	</p>

	<p class="element" data-label="Radio" data-type="radio" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/ic-radio-button-checked-48-px.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/ic-radio-button-checked-48-px-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/ic-radio-button-checked-48-px-copy-2.svg') }}" >
		Radio
	</p>

	<p class="element" data-label="Date" data-type="date" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/142089.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/142089-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/142089-copy-2.svg') }}" >Date
	</p>

	<p class="element" data-label="Time" data-type="time" data-attribute="NONE">
		<img class="gray" src="{{ asset('/iconSVG/ic-access-time-24-px.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/ic-access-time-24-px-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/ic-access-time-24-px-copy.svg') }}" >Time
	</p>

	<p class="element html_text" data-label="Label" data-type="html" style="position: relative;">
		<img class="gray" src="{{ asset('/iconSVG/ic-code-48-px.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/ic-code-48-px-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/ic-code-48-px-copy-2.svg') }}" >HTML
	</p>

	<p class="element" data-label="Button" data-type="button">
		<img class="gray" src="{{ asset('/iconSVG/mouse-window-5.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/mouse-window-5-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/mouse-window-5-copy.svg') }}" >Button
	</p>

	<p class="element hidden" data-type="layout">
		<img class="gray" src="{{ asset('/iconSVG/object-placement-66.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/object-placement-66-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/object-placement-66-copy-2.svg') }}" >Column Layout
	</p>

	<p class="element attribute" data-type="attribute" style="position:relative;">
		<img class="gray" src="{{ asset('/iconSVG/group.svg') }}" >
		<img class="copy" src="{{ asset('/iconSVG/group-copy.svg') }}" >
		<img class="copy-2" src="{{ asset('/iconSVG/group-copy-2.svg') }}" >Attribute
		<div class="attribute_menu">
			<img src="{{ asset('/iconSVG/x-2-gray.svg') }}" alt="" style="position:absolute;top:5px;right:5px;z-index: 2;width: 15px;cursor: pointer;" class="hidden_tab">
			<p class="search" >
				<span class="input"><input type="text" placeholder="Search Attribute"></span>
			</p>
			@foreach($attribute as $ab)
			<p class="element" data-label="{{$ab['label']}}" data-name="{{$ab['name']}}" data-type="{{$ab['type']}}" data-id="{{$ab->id_attribute}}" data-option="{{$ab->options}}" data-attribute="{{$ab['label']}}">{{$ab['label']}}</p>
			@endforeach
		</div>
	</p>
	
</div>