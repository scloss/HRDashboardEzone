<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{	

		$skip = array(
					'add_employee',
					'authenticate_login',
					'add_department',
					'add_designation',
					'add_division',
					'add_section',
					'add_supervisor',
					'add_job_location',
					'add_office_location',
					'add_news',
					'add_notice',
					'add_event',
					'confirm_department_edit',
					'confirm_designation_edit',
					'confirm_employee_edit',
					'confirm_division_edit',
					'confirm_section_edit',
					'confirm_supervisor_edit',
					'confirm_job_location_edit',
					'confirm_office_location_edit',
					'confirm_department_delete',
					'confirm_designation_delete',
					'confirm_employee_delete',
					'confirm_division_delete',
					'confirm_section_delete',
					'confirm_supervisor_delete',
					'confirm_job_location_delete',
					'confirm_office_location_delete',
					'select_move_employees',
					'confirm_move_employees',
					'view_employee_details',
					'search',
					'add_image'

					);
 
		foreach ($skip as $key => $route) {
			//skip csrf check on route
			if($request->is($route)){
				return parent::addCookieToResponse($request, $next($request));
			}
		}
		return parent::handle($request, $next);
	}

}
