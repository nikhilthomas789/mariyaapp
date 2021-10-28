defmodule MixTaskTest do
  use ExUnit.Case
  doctest MixTask

  test "greets the world" do
    assert MixTask.hello() == :world
  end
end
