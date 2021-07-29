<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('basic_data_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/databases*") ? "c-show" : "" }} {{ request()->is("admin/region-sources*") ? "c-show" : "" }} {{ request()->is("admin/localisation-types*") ? "c-show" : "" }} {{ request()->is("admin/reference-proteomes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-baseball-ball c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicData.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('database_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.databases.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/databases") || request()->is("admin/databases/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.database.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('region_source_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.region-sources.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/region-sources") || request()->is("admin/region-sources/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.regionSource.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('localisation_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.localisation-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/localisation-types") || request()->is("admin/localisation-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bezier-curve c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.localisationType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('reference_proteome_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reference-proteomes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reference-proteomes") || request()->is("admin/reference-proteomes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-retweet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.referenceProteome.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('pdb_related_mysql_data_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/pdbtms*") ? "c-show" : "" }} {{ request()->is("admin/new-chain-matrices*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.pdbRelatedMysqlData.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pdbtm_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pdbtms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pdbtms") || request()->is("admin/pdbtms/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-codepen c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pdbtm.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('new_chain_matrix_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.new-chain-matrices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/new-chain-matrices") || request()->is("admin/new-chain-matrices/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-codepen c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.newChainMatrix.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('sequence_related_mysql_data_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sequences*") ? "c-show" : "" }} {{ request()->is("admin/identifiers*") ? "c-show" : "" }} {{ request()->is("admin/alignments*") ? "c-show" : "" }} {{ request()->is("admin/species*") ? "c-show" : "" }} {{ request()->is("admin/uniprot-acs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-sort c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sequenceRelatedMysqlData.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('sequence_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sequences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sequences") || request()->is("admin/sequences/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sort c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sequence.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('identifier_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.identifiers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/identifiers") || request()->is("admin/identifiers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-id-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.identifier.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('alignment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.alignments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/alignments") || request()->is("admin/alignments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-center c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.alignment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('species_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.species.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/species") || request()->is("admin/species/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.species.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('uniprot_ac_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.uniprot-acs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/uniprot-acs") || request()->is("admin/uniprot-acs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-university c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.uniprotAc.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('region_related_mysql_data_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/regions*") ? "c-show" : "" }} {{ request()->is("admin/pdbtm-regions*") ? "c-show" : "" }} {{ request()->is("admin/cctop-res*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-registered c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.regionRelatedMysqlData.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('region_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.regions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/regions") || request()->is("admin/regions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-registered c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.region.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pdbtm_region_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pdbtm-regions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pdbtm-regions") || request()->is("admin/pdbtm-regions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-anchor c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pdbtmRegion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('cctop_re_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cctop-res.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cctop-res") || request()->is("admin/cctop-res/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-passport c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cctopRe.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>