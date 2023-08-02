<div class="card ot-card">

    <div class="card-body">

        <form method="POST" action="{{ @$data['url'] }}" enctype="multipart/form-data">
            @csrf

            {{-- Style Two --}}
            <div class="row mb-3 row mb-3 d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="small-tittle-two border-bottom mb-20 pb-8">
                        <h4 class="title text-capitalize font-600">
                            {{ ___('instructor.Commission') }}
                        </h4>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-md-6 mb-3">
                            <label for="password" class="form-label ">
                                {{ ___('common.Password') }}
                                <span class="fillable">*</span>
                            </label>
                            <input class="form-control ot-input @error('password') is-invalid @enderror" type="password"
                                name="password" id="password" placeholder="************************">
                            @error('password')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xl-12 col-md-6 mb-3">
                            <label for="commission" class="form-label ">
                                {{ ___('instructor.Commission') }}
                                <span class="fillable">*</span>
                            </label>
                            <input class="form-control ot-input @error('commission') is-invalid @enderror" value="{{ (@$data['instructor']->commission) }}"
                                name="commission" type="number" id="commission" placeholder="10">
                            @error('commission')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="col-md-12 mt-24">
                    <div class="text-end">
                        <button class="btn btn-lg ot-btn-primary"><span>
                            </span>{{ ___('common.Update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
