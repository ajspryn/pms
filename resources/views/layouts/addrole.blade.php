<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
      <div class="modal-content p-3 p-md-5">
        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body">
          <div class="text-center mb-4">
            <h3 class="role-title mb-2">Add New Role</h3>
            <p class="text-muted">Set role permissions</p>
          </div>
          <!-- Add role form -->
          <form id="addRoleForm" class="row g-3" onsubmit="return false">
            <div class="col-12 mb-4">
              <label class="form-label" for="modalRoleName">Role Name</label>
              <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Enter a role name" tabindex="-1" />
            </div>
            <div class="col-12">
              <h5>Role Permissions</h5>
              <!-- Permission table -->
              @foreach($permissions as $perm)
        <?php
        $per_found = null;

        if (isset($role)) {
            $per_found = $role->hasPermissionTo($perm->name);
        }

        if (isset($user)) {
            $per_found = $user->hasDirectPermission($perm->name);
        }

        $labelName = Str::of($perm->name)->replace("_", " ");
        ?>
        <div class="col-sm-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" id="{{ $perm->id }}" value="{{ $perm->name }}" {{  ($per_found == true ? ' checked' : '') }} {{ $disabled ?? '' }}>
                <label class="form-check-label {{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}" for="{{ $perm->id }}">
                    {{ $labelName }}
                </label>
            </div>
        </div>
    @endforeach
              <!-- Permission table -->
            </div>
            <div class="col-12 text-center mt-4">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
          <!--/ Add role form -->
  