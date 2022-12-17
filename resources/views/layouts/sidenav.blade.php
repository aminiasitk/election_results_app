<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li class="nav-label first">Main Menu</li>
			<li>
				<a class="has-arrow" href="#" aria-expanded="false">
					<i class="la la-home"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-users"></i>
					<span class="nav-text">Parties</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('party.index') }}">All Parties</a></li>
					<li><a href="{{ route('party.create') }}">Add Party</a></li>
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-user"></i>
					<span class="nav-text">Candidates</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="education/professors/all-professors.html">All Candidates</a></li>
					<li><a href="education/professors/add-professor.html">Add Candidate</a></li>
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-location-arrow"></i>
					<span class="nav-text">Venues</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('venue.index') }}">All Venues</a></li>
					<li><a href="{{ route('venue.create') }}">Add Venue</a></li>
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-building"></i>
					<span class="nav-text">Stations</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="education/students/all-students.html">All Stations</a></li>
					<li><a href="education/students/add-student.html">Add Station</a></li>
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-check"></i>
					<span class="nav-text">Votes</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="education/students/all-students.html">All Votes</a></li>
					<li><a href="education/students/add-student.html">Add Vote</a></li>
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-calculator"></i>
					<span class="nav-text">Results</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="education/students/all-students.html">All Results</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
