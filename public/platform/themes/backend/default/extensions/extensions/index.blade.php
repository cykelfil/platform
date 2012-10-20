@layout('templates.default')

@section('title')
    {{ Lang::line('extensions::general.title')->get() }}
@endsection

@section('content')
<section id="extensions">

	<!-- Tertiary Navigation & Actions -->
	<header class="navbar">
		<div class="navbar-inner">
			<div class="container">

			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target="#tertiary-navigation">
				<span class="icon-reorder"></span>
			</a>

			<a class="brand" href="#">{{ Lang::line('extensions::general.title') }}</a>

			<!-- Everything you want hidden at 940px or less, place within here -->
			<div id="tertiary-navigation" class="nav-collapse">
				@widget('platform.menus::menus.nav', 2, 1, 'nav nav-pills', ADMIN)
			</div>

			</div>
		</div>
	</header>

	<hr>

	<div class="quaternary page">
        <table id="installed-extension-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="span2">{{ Lang::line('extensions::table.name')->get() }}</th>
                    <th class="span1">{{ Lang::line('extensions::table.version')->get() }}</th>
                    <th class="span4">{{ Lang::line('extensions::table.description')->get() }}</th>
                    <th class="span2">{{ Lang::line('extensions::table.actions')->get() }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $extensions as $extension )
                <tr>
                    <td><a href="{{ URL::to_admin('extensions/view/' . array_get($extension, 'info.slug')) }}">{{ array_get($extension, 'info.name') }}</a></td>
                    <td>{{ array_get($extension, 'info.version') }}</td>
                    <td>
                        {{ array_get($extension, 'info.description') }}

                        @if ( ! Platform::extensions_manager()->is_installed(array_get($extension, 'info.slug')) and ! Platform::extensions_manager()->can_install(array_get($extension, 'info.slug')) )
                            <span class="pull-right label label-warning">{{ Lang::line('general.required')->get() }}: {{ implode(', ', Platform::extensions_manager()->required_extensions(array_get($extension, 'info.slug')) ) }}</span>
                        @endif
                        @if ( Platform::extensions_manager()->has_update(array_get($extension, 'info.slug')) )
                            <span class="pull-right label label-info">{{ Lang::line('extensions::table.has_updates')->get() }}</span>
                        @endif
                    </td>
                    <td>
                        @if ( Platform::extensions_manager()->is_installed(array_get($extension, 'info.slug')) )
                            @if ( Platform::extensions_manager()->can_uninstall(array_get($extension, 'info.slug')) )
                                <a class="btn" href="{{ URL::to_admin('extensions/uninstall/' . array_get($extension, 'info.slug')) }}">{{ Lang::line('extensions::button.uninstall')->get() }}</a>
                            @else
                                <a class="btn disabled">{{ Lang::line('extensions::button.uninstall')->get() }}</a>
                            @endif

                            @if ( Platform::extensions_manager()->is_enabled(array_get($extension, 'info.slug')) )
                                @if ( Platform::extensions_manager()->can_disable(array_get($extension, 'info.slug')) )
                                    <a class="btn" href="{{ URL::to_admin('extensions/disable/' . array_get($extension, 'info.slug')) }}">{{ Lang::line('extensions::button.disable')->get() }}</a>
                                @else
                                    <a class="btn disabled">{{ Lang::line('extensions::button.disable')->get() }}</a>
                                @endif
                            @else
                                @if ( Platform::extensions_manager()->can_enable(array_get($extension, 'info.slug')) )
                                    <a class="btn" href="{{ URL::to_admin('extensions/enable/' . array_get($extension, 'info.slug')) }}">{{ Lang::line('extensions::button.enable')->get() }}</a>
                                @else
                                    <a class="btn disabled">{{ Lang::line('extensions::button.enable')->get() }}</a>
                                @endif
                            @endif
                        @else
                            @if ( Platform::extensions_manager()->can_install(array_get($extension, 'info.slug')) )
                                <a class="btn" href="{{ URL::to_admin('extensions/install/' . array_get($extension, 'info.slug')) }}">{{ Lang::line('extensions::button.install')->get() }}</a>
                            @else
                                <a class="btn disabled">{{ Lang::line('extensions::button.install')->get() }}</a>
                            @endif
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
