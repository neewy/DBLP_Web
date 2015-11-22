<?php session_start();
	if(isset($_SESSION['login_user'])){ ?>
<div class="datatable_wrapper" style="display:none">
                <form class="pure-form">
                    <fieldset>
                        <legend id="top-legend">Showing 50 results with offset <?php echo($_SESSION['book_offset']);?></legend>

                         <label for="book-field">Field</label>
                        <select id="book-field">
                            <option>Key</option>
                            <option value="mdate">Date</option>
                            <option>Editor</option>
                            <option>Title</option>
                            <option>Year</option>
                            <option>Journal</option>
                            <option>Volume</option>
                            <option value="cite">Citation key</option>
                            <option>Publisher</option>
                            <option>ISBN</option>
                           
                        </select>
                        <input type="text" id="book-search-value" class="pure-input-1-3" placeholder="Search value">
                        <a id="book_search" class="pure-button pure-button-primary">Search</a>
                    </fieldset>
                </form>
				<table id="sortTable" class="datatable pure-table pure-table-bordered tablesorter">
					<thead>
						<tr>
							<th>Editor</th>
							<th>Title</th>	
							<th>Date</th>
							<th>Year</th>
							<th>ISBN</th>
						</tr>
					</thead>
					<tbody id="datatable_body">
					</tbody>
				</table>
</div>
<?php } else {
		echo("<h2>Please, log into the system</h2>");
	} ?>