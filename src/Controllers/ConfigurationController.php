<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Uasoft\Badaso\Exceptions\SingleException;
use Uasoft\Badaso\Helpers\ApiResponse;
use Uasoft\Badaso\Models\Configuration;
use Uasoft\Badaso\Traits\FileHandler;

class ConfigurationController extends Controller
{
    use FileHandler;

    public function browse()
    {
        $configurations = Configuration::where('group', 'commerceThemePanel')->orderBy('order')->get();

        $data['configurations'] = $configurations;

        return ApiResponse::success(collect($data)->toArray());
    }

    public function read(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
            ]);
            $configuration = Configuration::where('group', 'commerceThemePanel')->where('id', $request->id)->first();

            $data['configuration'] = $configuration;

            return ApiResponse::success($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    public function edit(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'id'           => 'required|exists:Uasoft\Badaso\Models\Configuration',
                'key'          => 'required',
                'display_name' => 'required',
                'value'        => 'required',
                'details'      => 'required',
                'type'         => 'required',
                'order'        => 'required',
                'group'        => 'required',
            ]);

            $configuration = Configuration::where('group', 'commerceThemePanel')->where('id', $request->id)->first();

            if (!is_null($configuration)) {
                $configuration->key = $request->key;
                $configuration->display_name = $request->display_name;
                $configuration->value = $request->value;
                $configuration->details = $request->details;
                $configuration->type = $request->type;
                $configuration->order = $request->order;
                $configuration->group = 'commerceThemePanel';
                $configuration->save();
            }

            DB::commit();

            return ApiResponse::success($configuration);
        } catch (Exception $e) {
            DB::rollback();

            return ApiResponse::failed($e);
        }
    }

    public function editMultiple(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'configurations' => 'required',
            ]);
            foreach ($request->configurations as $configuration) {
                Validator::make($configuration, [
                    'id' => ['required'],
                ])->validate();
                $updated_configuration = Configuration::where('group', 'commerceThemePanel')->where('id', $configuration['id'])->first();
                if (!is_null($configuration)) {
                    $updated_configuration->key = $configuration['key'];
                    $updated_configuration->display_name = $configuration['display_name'];
                    $updated_configuration->value = $configuration['value'];
                    $updated_configuration->details = json_encode($configuration['details']);
                    $updated_configuration->type = $configuration['type'];
                    $updated_configuration->order = $configuration['order'];
                    $updated_configuration->group = 'commerceThemePanel';
                    $updated_configuration->save();
                }
            }

            DB::commit();

            return ApiResponse::success();
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function add(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'key'          => 'required|unique:Uasoft\Badaso\Models\Configuration',
                'display_name' => 'required',
                'group'        => 'required',
                'type'         => 'required',
                'details'      => [
                    function ($attribute, $value, $fail) use ($request) {
                        if (in_array($request->type, ['checkbox', 'radio', 'select', 'select_multiple'])) {
                            json_decode($value);
                            $is_json = (json_last_error() == JSON_ERROR_NONE);
                            if (!$is_json) {
                                $fail('The details must be a valid JSON string.');
                            }
                        }
                    },
                    function ($attribute, $value, $fail) use ($request) {
                        if (in_array($request->type, ['checkbox', 'radio', 'select', 'select_multiple'])) {
                            if (!isset($value) || is_null($value)) {
                                $fail('Options is required for  Checkbox, Radio, Select, Select-multiple');
                            }
                        }
                    },
                ],
            ]);
            $configurationOrder = Configuration::select('order')->where('group', 'commercePanel')->latest()->first();
            $configuration = new Configuration();
            $data = $request->all();
            $data['can_delete'] = $request->get('can_delete', true);
            $configuration_fillable = $configuration->getFillable();
            foreach ($data as $key => $value) {
                $property = Str::snake($key);
                if (in_array($property, $configuration_fillable)) {
                    $configuration->{$property} = $value;
                }
            }
            $configuration->order = $configurationOrder->order + 1;
            $configuration->save();

            DB::commit();

            return ApiResponse::success($configuration);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'id' => 'required',
            ]);

            $config = Configuration::where('group', 'commerceThemePanel')->where('id', $request->id)->first();
            if ($config->can_delete) {
                $config->delete();
            } else {
                throw new SingleException('Cannot delete this config');
            }

            DB::commit();

            return ApiResponse::success();
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }
}
