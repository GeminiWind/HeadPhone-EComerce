@component('mail::message')
# From: {{ $request->name}}

## Dear Mr/Mrs....
### {{ $request->name}} send your compnany an e-mail with the belowing content
_{{ $request->message}}_


Thanks,<br>
{{ config('app.name') }}
@endcomponent
